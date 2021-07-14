<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;

class UserTransactions extends Component
{
    public function render()
    {
        $limit = 25;
        //$num = num_rows($request->input('page'), $limit);

        $transactions = Account::findOrFail(1)->transactions()->paginate($limit);

        $data = [
            'transactions' => $transactions,
            'num' => 1
        ];
        return view('livewire.user-transactions', $data);

    }
}
