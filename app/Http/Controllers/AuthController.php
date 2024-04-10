<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validate;

class AuthController extends Controller
{
    protected $redirectTo = 'dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            $request->validate([
                'login'       => 'required|string',
                'password'    => 'required|string',
                'remember_me' => 'boolean',
            ]);

            $fieldTypeLogin = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $credentials = [$fieldTypeLogin => $request->login, 'password' => $request->password];
            $user = User::where($fieldTypeLogin, request()->get('login'))->first();
            if (Auth::attempt($credentials) && $user->is_active) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            }

            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');
        }

        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
}
