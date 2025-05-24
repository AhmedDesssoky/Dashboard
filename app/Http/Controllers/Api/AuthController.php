<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    Public function login(LoginRequest $request){
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $data = [
                'token' => $user->createToken('User')->plainTextToken,
                'name' => $user->name,
                'email' => $user->email,
            ];

            return ApiResponse::sendResponse(200,'User Logged in Successfully',$data);

        }else{
            return ApiResponse::sendResponse(200,'The Credential does\'t exits',[]);
 
        }


    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200 , 'Logged out successfully',[]);
    }
}
