<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $statusSuccess = 200;
    private $statusError = 401;
    //
    public function login(Request $request){
        $request->validate([
            'mobile' => 'required|digits:11',
            'password' => 'required|string'
        ]);
        $credintials = request(['mobile', 'password']);
        if(!Auth::attempt($credintials)){
            return response()->json([
                'message' => 'Unauthorized'
            ], $this->statusError);
        }

        $user = Auth::user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ]);

    }

    public function register(Request $request){
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mobile' => 'required|unique:users,mobile|digits:11',
            'password' => 'required|string'
        ]);

        $user = new User([
                'mobile' => $request->mobile,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'password' => bcrypt($request->password)
            ]
        );
        $user->save();
        return response()->json([
            'message'=>'User successfully created',
        ],201);
    }

    public function user(Request $request)
    {
        return response()->json(Auth::user());
    }

    public function logout(Request $request){
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ],$this->statusSuccess);
    }
}
