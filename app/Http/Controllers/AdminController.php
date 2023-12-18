<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function login() {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postLogin(Request $request) {
//        dd($request->all());

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
//            'id_role' => 1,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'Nhập sai mật khẩu hoặc tên đăng nhập!');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}
