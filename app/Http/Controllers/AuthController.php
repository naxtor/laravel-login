<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    function login_view()
    {
        $string_captcha = Str::random(5);

        return view('login')->with('string_captcha', $string_captcha);
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'input_captcha' => 'required',
        ]);

        if (session('next_attempt') && session('attempt') == 3) {
            $request->session()->forget('attempt');
            $request->session()->forget('next_attempt');
        }

        if ($request->input('input_captcha') != $request->input('string_captcha')) {
            return back()->with('error', 'Captcha tidak valid !');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->forget('attempt');
            $request->session()->forget('next_attempt');
            $request->session()->forget('nama');

            return redirect()->route('dashboard_view');
        }

        if ($request->session('attempt') && session('attempt') != 3) {
            $request->session()->put('attempt', session('attempt') + 1);

            if ($request->session()->get('attempt') == 3) {
                $request->session()->put('next_attempt', Carbon::now()->addSeconds(30));
            }
        } else {
            $request->session()->put('attempt', 1);
        }

        return back()->with('error', 'Email dan password tidak valid !');
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('login_view');
    }

    function register_view()
    {
        return view('register');
    }

    function reset_password_view()
    {
        return view('reset_password');
    }
}
