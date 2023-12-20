<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::id()) {
            return redirect()->route('template');
        } else {
            return view('frontend.auth.login');
        }
    }

    public function signup()
    {
        return view('frontend.auth.signup');
    }

    public function postSignup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('frontend.auth.login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('template');
        }
        return redirect()->back()->with('error', 'Nhập sai mật khẩu hoặc tên đăng nhập!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('template');
    }
}
