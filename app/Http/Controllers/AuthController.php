<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AuthController extends Controller
{
    public function login(LoginRequest $request){
        
        $credentials = $request->only('user_name', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            return view('home');
        } else {
            return response()->json(["errors" => [trans('user.login.fail')]], 412);
        }
    }

    public function logout()
    {
        if(request()->user()->token()->revoke()){
            return response()->json(["message" => trans('user.logout.success')], 200);
        } else {
            return response()->json(["errors" => [trans('user.logout.fail')]], 200);
        }
    }
}
