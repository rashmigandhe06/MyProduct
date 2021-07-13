<?php

namespace App\Http\Controllers\user\bank;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $limit=10;
        $num  = num_rows($request->input('page'), $limit);

        $accounts = \App\Models\User::findOrFail(auth()->user()->id)->accounts;

        $data =[
            'accounts' => $accounts,
            'num' => $num
        ];
        return view('user.bank.account.index')->with($data);

    }
}
