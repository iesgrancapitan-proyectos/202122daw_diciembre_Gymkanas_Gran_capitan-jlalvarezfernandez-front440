<?php

/**
 * Controlador Group_testController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto al login.
 * 
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller{
    
    public function validateLogin(Request $request){
      return $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device' => 'required'
      ]);
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }
}