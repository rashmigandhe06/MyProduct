<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('verification');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->where('verification_code', $request->verification_code)->first();
        if ($user) {
            $user = User::find($user->id);
            $user->verified = 1;
            $user->save();
            return redirect()->intended('/login')->with('status', 'success');
        } else {
            return redirect()->back()->with('status', 'fail');
        }


    }


}
