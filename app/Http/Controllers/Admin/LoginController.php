<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use function MongoDB\BSON\toJSON;

class LoginController extends Controller
{
    public function loginForm(){
        return view('admin.auth._index');
    }

    public function getUser(){
        return json_encode(Auth::guard('web')->user());
    }
    public function login(Request $request){
        Auth::logout();
        $credentials = $request->only('mobile', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect(route('get_user'));
        }else{
            view('admin.auth.__index');
        }


    }
    //
}
