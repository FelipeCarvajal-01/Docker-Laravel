<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Utils\JsonHttpResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    //
    public function login(LoginRequest $request){
        $credenciales =[
            'email' =>$request->email,
            'password'=>$request->password
        ];
        try{
            if(!$jwt = JWTAuth::attempt($credenciales)){
                return JsonHttpResponse::errorResponse(
                    'credenciales invalidas',
                    'error',
                    401
                );
            }

        }
        catch(JWTException $e){
            return JsonHttpResponse::errorResponse(
                'error en servidor: '.$e -> getMessage(),
                'error',
            );
        }
        $user = auth()->user();
        $user ->jwt_token = $jwt;

        return JsonHttpResponse::successResponse(
            $user,
            'success',
            200
        ) ;

    }
    public function register(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email' =>$request->email,
            'password'=>Hash::make($request->password)
        ]

        );
        return JsonHttpResponse::successResponse(
            $user,
            'success',
            200
        );
    }
}
