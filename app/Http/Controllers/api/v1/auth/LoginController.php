<?php

namespace App\Http\Controllers\api\v1\auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\auth\LoginRequest;

class LoginController extends Controller
{
    protected $requestLogin = ['email','password'];
    public function __construct(
        private User $user 
    ){
        
    }
    // This First Controller With Login Api With App

    public function login(LoginRequest $request){
        $credentials= $request->only($this->requestLogin);
        $checkData = Auth::attempt($credentials);
        if(!$checkData){
                return response()->json(['faild'=> 'Check Your credentials'],400);
        }else{
          $user =  $this->user->where('email', $credentials['email'])->first();
           $token = $user->createToken('personal access Tokens')->plainTextToken;
            $user->token = $token;
            return response()->json([
                'success'=>'Login Successfully',
                '_token'=>$token,
                'type'=>$user->type,
            ]);
        }
        
    }


    public function logout(Request $request)
    {
    if($request->user()){
            $user =$request->user();
            $deletToken = $user->tokens()->delete();
            if ($deletToken) {
            return response()->json(['success'=>'User Logout Successfully']);
            }
        } else {
            return response()->json(['faild'=>'User Unauthorized']);
        }
       
    }
           
}
