<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function loginForm(){
        return view('welcome');
    }
    //
}
