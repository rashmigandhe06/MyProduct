<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Transaction;
use App\Services\BankIntegrationService;
use Illuminate\Http\Request;

class TrueLayerController extends Controller
{

    /**
     * TrueLayerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @param BankIntegrationService $bankIntegrationService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request, BankIntegrationService $bankIntegrationService)
    {
        if ($request->input('code')) {

            $data = [
                'code' => $request->input('code'),
                'url' => 'https://auth.truelayer-sandbox.com/connect/token'
            ];
            $resp = $bankIntegrationService->getBankAPIAccessToken($data);
            $data['status'] = $resp['status'];
            if ($resp['status'] > 200) {
                return view('user.callback')->with($data);
            } else {
                session(['access_token_val' => $resp['data']->access_token]);
                return redirect('bank-api');
            }
        }
        return view('user.callback');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function cancel()
    {
        return view('user.cancel');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function help()
    {
        return view('user.help');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function description()
    {
        return view('user.description');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connect(): \Illuminate\Http\RedirectResponse
    {
        $url = "https://auth.truelayer-sandbox.com/?response_type=code&client_id=sandbox-223459181-72c8d2&scope=info%20accounts%20balance%20cards%20transactions%20direct_debits%20standing_orders&redirect_uri=http://127.0.0.1:8000/callback&providers=uk-ob-all%20uk-oauth-all%20uk-cs-mock";
        return redirect()->away($url);
    }

    /**
     * @param BankIntegrationService $bankIntegrationService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function bankApiCall(BankIntegrationService $bankIntegrationService)
    {

        $data = [
            'url' => 'https://api.truelayer-sandbox.com/data/v1/accounts/'
        ];
        $resp = $bankIntegrationService->getUserBankAccountList($data);

        if ($resp['status'] == 200) {
            $accountArr = json_decode($resp['data'], true);

            foreach ($accountArr['results'] as $account) {

                //insert data into Bank Table
                $bank = Bank::where('bank_code', '=', $account['provider']['provider_id'])->first();

                if ($bank == null) {
                    $bankResp = Bank::create($this->bankData($account));
                    $bank_id = $bankResp->id;
                } else {
                    $bank_id = $bank->id;
                }

                //insert data into Branch Table
                $branch = Branch::where('bank_id', '=', $bank_id)->where('sort_code', '=', $account['account_number']['sort_code'])->first();
                if ($branch == null) {
                    $branchResp = Branch::Create($this->branchData($account, $bank_id));
                    $branch_id = $branchResp->id;
                } else {
                    $branch_id = $branch->id;
                }

                //insert data into Account Table
                $userAccount = Account::where('user_id', '=', auth()->user()->id)
                    ->where('account_number', '=', $account['account_id'])
                    ->first();
                if ($userAccount == null) {

                    $accountRes = Account::Create($this->accountData($account, $bank_id, $branch_id));
                    $account_id = $accountRes->id;
                } else {
                    $account_id = $userAccount->id;
                }

                $data = [
                    'url' => "https://api.truelayer-sandbox.com/data/v1/accounts/" . $account['account_id'] . "/transactions"
                ];
                $transactionsData = $bankIntegrationService->getUserAccountTransactionList($data);
                $transactionsArr = json_decode($transactionsData['data'], true);
                foreach ($transactionsArr['results'] as $transaction) {
                    $userTransaction = Transaction::where('tran_id', '=', $transaction['transaction_id'])->first();
                    if ($userTransaction == null) {
                        Transaction::create($this->transactionData($transaction, $account_id));
                    }
                }//end of transaction arr
            }
        } else if ($resp['status'] == 401) {
            return view('user.callback')->with($data);
        }

        return view('user.bank_api');
    }

    /**
     * @param $account
     * @return array
     */
    public function bankData($account): array
    {
        return [
            'bank_name' => $account['provider']['display_name'],
            'bank_code' => $account['provider']['provider_id'],
            'logo_uri' => $account['provider']['logo_uri'],
        ];
    }

    /**
     * @param $account
     * @param $bank_id
     * @return array
     */
    public function branchData($account, $bank_id): array
    {
        return [
            'bank_id' => $bank_id,
            'sort_code' => $account['account_number']['sort_code'],
            'branch_code' => $account['account_number']['swift_bic'],
        ];
    }

    /**
     * @param $account
     * @param $bank_id
     * @return array
     */
    public function accountData($account, $bank_id, $branch_id): array
    {
        return [
            'user_id' => auth()->user()->id,
            'bank_id' => $bank_id,
            'branch_id' => $branch_id,
            'bi_number' => $account['account_number']['number'],
            'account_number' => $account['account_id'],
            'account_type' => $account['account_type'],
            'display_name' => $account['display_name'],
            'currency' => $account['currency'],
            'data_source' => 'Bank API',
            'update_timestamp' => explode("T", $account['update_timestamp'])[0],
        ];
    }


    public function transactionData($transaction, $account_id): array
    {
        return [
            'user_id' => auth()->user()->id,
            'account_id' => $account_id,
            'tran_id' => $transaction['transaction_id'],
            'transaction_time' => date('Y-m-d h:i:s', strtotime($transaction['timestamp'])),
            'transaction_type' => $transaction['transaction_type'],
            'transaction_category' => $transaction['transaction_category'],
            'description' => $transaction['description'],
            'amount' => $transaction['amount'],
            'currency' => $transaction['currency'],
            'merchant_name' => isset($transaction['merchant_name']) ?? '',
            'provider_transaction_id' => isset($transaction['provider_transaction_id']) ?? '',
            'version_two_id' => isset($transaction['version_two_id'],) ?? '',
            'running_balance_currency' => isset($transaction['running_balance']['currency']) ?? '',
            'running_balance_amount' => isset($transaction['running_balance']['amount']) ?? '',
            'transaction_classification' => isset($transaction['transaction_classification']) ?? '',
            'provider_transaction_category' => isset($transaction['meta']['provider_transaction_category']) ?? '',
            'data_source' => 'BANK API'
        ];
    }
}
