<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validate;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('POST')){
            $request->validate([
                'login'       => 'required|string',
                'password'    => 'required|string',
                'remember_me' => 'boolean',
            ]);
            
            $fieldTypeLogin = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $credentials = [$fieldTypeLogin => $request->email, 'password' => $request->password];

            $user = User::where($fieldTypeLogin, request()->get('login'))->first();

            if (is_null($user) || !$user->is_active || !Auth::attempt($credentials)) {
                return redirect()->back();
            }
        }

        return view('login');
    }
}
