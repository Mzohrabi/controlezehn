<?php

namespace App\Http\Controllers;

use App\User;
use App\Utilities\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Json;

class UserController extends Controller
{
    private $statusSuccess = 200;
    private $statusError = 401;
    //
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|digits:11'
        ]);

        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(
                [
                    'type'=>'error',
                    'errors'=>$validator->errors()
                ]);
        }
//        $credintials = request(['mobile']);
//        if(!User::where($credintials)){
//            return response()->json([
//                'message' => 'Unauthorized'
//            ], $this->statusError);
//        }
        $user = User::where('mobile', $request->mobile)->first();
        if($user != null){
            $password = rand(10000,99999);
            $user->password = bcrypt($password);
            $user->save();
            Sms::send(
                'رمز شما : '.$password,
                $request->mobile
            );
            return response()->json([
                'type' => 'success',
                'message' => 'رمز عبور برای شما ارسال شد...'
            ]);
        }else{
            return response()->json([
                'type' => 'error',
                'error' => 'not_found',
                'message' => 'کاربری با این شماره موبایل در سیستم موجود نیست!'
            ]);
        }

    }

    public function confirmCode(Request $request) {
        $request->validate([
            'mobile' => 'required|digits:11',
            'password' => 'required|digits:5'
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
        $validator = Validator::make($request->all(),[
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mobile' => 'required|unique:users,mobile|digits:11',
        ]);

        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(
                [
                    'type'=>'error',
                    'errors'=>$validator->errors()
                ]);
        }
//        $request->validate([
//
//        ]);
        $user = new User([
                'mobile' => $request->mobile,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'password' => bcrypt("123456")
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
