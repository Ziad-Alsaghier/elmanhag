<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{

    // Sign up Page

    public function  signup(){
        $countries = country::all();
        $cities = city::all();
        $categories = category::
        where('category_id', '!=', null)
        ->get();

        return response()->json([
            'countries' => $countries,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }

    // Sign up Student Proccessing

    public function signup_proccess(SignupRequest $request){
        $requestSignup['type'] = 'student';
        $data= $request->only($this->requestSignup);
        User::create($data);

        $token = $user->createToken('personal access Tokens')->plainTextToken;
        return response()->json([
            'success'=>'Sign Up Successfully',
            '_token'=>$token,
            'detailes'=>$data,
        ]);
        
    }
}
