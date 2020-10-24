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

    /**
     * Login
     *
     * وب سرویس ورود
     * @group Auth
     * @bodyParam mobile is required
     * @response {
    "type": "success",
    "message": "رمز عبور برای شما ارسال شد..."
    }
     */
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
    /**
     * Confirm Code
     *
     * تایید رمز عبور
     * @group Auth
     * @bodyParam mobile is required
     * @bodyParam password is required
     * @response {
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOWRkZTg2MzFkMmEzYjgyZmI2MjRjZDBkMWQ4ZjkwODUxZTdmYzZmNmMzYmY5ZmEyNTI3ZmRhYjI4MDM2MGY5OTNlMWY0OGU4MDc3MzMzODIiLCJpYXQiOjE2MDMwNDc3OTYsIm5iZiI6MTYwMzA0Nzc5NiwiZXhwIjoxNjM0NTgzNzk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.J-WA9QUAVu1VurGLJ_QkIA3uw69jyUnkhWW9FXjcWcAMBGLGoPA4lscXFygaVecHqs5uYyq6KJOtart9MR_UvDEJhYm53hJLwuVcYROh8VvniJoFKIUOqnzeJMHpW2-mm05hW8l0deM_oAVfAe5iD8mnq7syRbsMLZ7WDLTPo8jZFBG8sf3cqaeNbWb5l0_YsRaB-1rJva8hZSvW30MHfyRdxyUCCzuXYwwW_VSTXBSoa6ijCsgFZipH8PkwdsQD-GoVyq4Gp9oK1Xx_HvBWVxTQUpguYIExMgC-HRbOKS6oy-CL3WjfoesUwevOibXprCy74MPsQnbsWIODCos1AB5Z0E-9JQpvVIfxf8-PMAh9H5tUTVmxDF5a7xmrK8n04M1vWxs9hicj3r_une9LPveRL7fW1gzbMKWQIkT5Ql8nCdGizVjXf9FEREr9WiBGE2sg9ioyPwyMAIfFTZJSSSdpDKx-rAAiDjgl1tmmmQ3jY1PjqwR-1xT4yNxevnrXCrGXj1ATH90KNb4hp1WC2aXBKGT-vmzeUXJPO8rndO57xRRNcinwG2LzEO87b61QfO4Q_xyQYMxyXLT69giOp1c6PsNUlOTSztbmMi1eK_Hlw7-HBSG4-6a2J8IxQCJyi8TeFF2kbihJ5SBpFpnOrDHThCdSkWopxNBzGhjc1XQ",
    "token_type": "Bearer"
    }
     */
    public function confirmCode(Request $request) {
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|digits:11',
            'password' => 'required|digits:5'
        ]);

        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(
                [
                    'type'=>'error',
                    'errors'=>$validator->errors()
                ]);
        }

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
    /**
     * Register
     *
     * ثبت نام
     * @group Auth
     * @bodyParam fname is required
     * @bodyParam lname is required
     * @bodyParam mobile is required
     * @response {
    "message": "User successfully created"
    }
     */
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
