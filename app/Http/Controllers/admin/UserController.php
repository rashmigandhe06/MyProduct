<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit=4;
        $num  = num_rows($request->input('page'), $limit);

        $search = $request->input('search');

        $users = $search?
            User::search($search)
            : User::paginate($limit);

        $data = [
            'users' => $users,
            'num' => $num
        ];

        return view('admin.user.index')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with("status", "User deleted successfully");

    }

    public function view(Request $request, User $user){

        $limit=4;
        $num  = num_rows($request->input('page'), $limit);

        $user = User::find($user->id);

        $userDocuments = $user->documents()->paginate($limit);
        $data = [
            'userDocuments' => $userDocuments,
            'user'=> $user,
            'num' => $num
        ];
        return view('admin.user.view')->with($data);
    }
}
