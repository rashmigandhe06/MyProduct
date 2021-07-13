<?php

namespace App\Http\Controllers\user\bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id)
    {

        $limit = 25;
        $num = num_rows($request->input('page'), $limit);

        $transactions = \App\Models\Account::findOrFail($id)->transactions()->paginate($limit);

        $data = [
            'transactions' => $transactions,
            'num' => $num
        ];
        return view('user.bank.transaction.index')->with($data);

    }
}
