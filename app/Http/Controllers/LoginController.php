<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{
    public function login(Request $request)
    {

        $login = $request->only(['email', 'password']);

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if(!Auth::attempt($login)){
            return response(["message"=>"Invalid credentials", 'status'=>401], 401);
        }
        $user = $request->user();
        return  $user->createToken('Secret Access Token');

    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!', 'status' => 200];
        return response($response, 200);
    }
}
