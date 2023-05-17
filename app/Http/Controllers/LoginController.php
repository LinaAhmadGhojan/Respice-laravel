<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use  App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Validator;


class LoginController  extends Controller
{

    public function login(RequestLogin $request)
    {

        if (\Auth::attempt($request->only(['email','password']), $request->get('remember')))
        {

            return response()->json(
                [
                  'code'=>200,
                  'message'=>  "login in system ",
                  'token'=>Auth::user()->createToken("token user")->plainTextToken
                ], 200);

        }

        return response()->json(
            [
              'code'=>401,
              'message'=>  "error in email or password ",
            ], 401);

    }
}
