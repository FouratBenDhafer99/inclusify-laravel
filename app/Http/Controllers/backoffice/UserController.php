<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('backoffice.users.index', ['users' => $model->paginate(15)]);
    }

    public function listUsers(){
        return view('backoffice.users.index', ['users' => User::all()]);
    }

    public function grantAdminRole($userId){
        User::where('id',$userId)->update([
            'role'=>'ADMIN'
        ]);
        return Redirect::back()->with('message','Operation Successful !');
    }
    public function revokeAdminRole($userId){
        User::where('id',$userId)->update([
            'role'=>'USER'
        ]);
        return Redirect::back()->with('message','Operation Successful !');
    }
}
