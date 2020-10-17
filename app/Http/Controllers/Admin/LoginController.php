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
        $credentials = $request->only('mobile', 'password');
//        $user = User::findOrFail(1);
//        $user->password = bcrypt('123456');
//        $user->save();
//        die(json_encode($user));
        if(Auth::guard('web')->attempt($credentials)){
            return redirect(route('admin.dashboard'));
        }else{
            return view('admin.auth._index');
        }


    }
    //
}
