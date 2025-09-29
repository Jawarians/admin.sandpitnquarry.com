<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        // Middleware will be applied in routes
    }
    
    public function forgotPassword()
    {
        return view('authentication/forgotPassword');
    }

    public function signIn()
    {
        return view('authentication/signin');
    }

    public function signUp()
    {
        return view('authentication/signup');
    }
    
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        
        // Check if email has sandpitnquarry.com domain
        $email = $request->email;
        $domain = substr(strrchr($email, "@"), 1);
        
        if ($domain !== 'sandpitnquarry.com') {
            return redirect()->back()
                ->withErrors(['email' => 'Only @sandpitnquarry.com email addresses are allowed'])
                ->withInput($request->except('password'));
        }
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication was successful
            return redirect()->intended('/');
        }
        
        // Authentication failed
        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput($request->except('password'));
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('signin');
    }
}
