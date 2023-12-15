<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function login() {
//        dd(Auth::id());
        return view('frontend.auth.login');
    }

    public function signup() {
        return view('frontend.auth.signup');
    }

    public function postSignup(Request $request) {
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

    public function postLogin(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
//            'email' => 'required|unique:posts|max:255',
            'password' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return view('frontend.index');
        }
        return redirect()->back()->with('error', 'Nhập sai mật khẩu hoặc tên đăng nhập!');
    }
}
