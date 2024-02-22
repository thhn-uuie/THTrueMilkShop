<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\Hello;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function login() {
        return view('admin.login');
    }

    public function register() {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
       public function postLogin(LoginRequest $request)
    {

        $name = $request->name;
        $password = $request->password;
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $token = null;

        if (Auth::attempt($data)) {
            if (Auth::user()->email_verified_at == null) {
                $token = Auth::user()->email_token;
                Auth::logout();
                return view('verify', compact(['name', 'password' , 'token']));
            }
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

    public function postRegister(RegisterRequest $request)
    {
        $this->logout($request);

        $user = null;
        try {
            $token = Str::random(8);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_token'=>$token,
                'id_role'=>$request->id_role,
            ]);

            Mail::to($request->email)->send(new Hello($request->name,  $token));
        } catch (\Throwable $th) {
            $user->delete();
        }
        return redirect()->route('admin.login');
    }

    public function verify(Request $request) {
        // dd($request);
        if ($request->action == "refesh") {
            try {
                $token = Str::random(8);
                $name=$request->name;
                $password = $request->password;
                $user = User::where('name', $name)->get()->first();
                $user->update([
                    'email_token' => $token,
                ]);

                Mail::to($user->email)->send(new Hello($request->name,  $token));
                return view('verify', compact(['name', 'password', 'token']))->with('error', 'Đã gửi lại!');
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        if ($request->isMethod('POST')) {
            if (!($request->token_input == $request->token)) {
                $name=$request->name;
                $password = $request->password;
                $token = $request->token;
                return view('verify', compact(['name', 'password', 'token']))->with('error', 'Mã xác thực không đúng!');
            }
            $data = [
                'name' => $request->name,
                'password' => $request->password,
            ];
            if (Auth::attempt($data)) {
                $user = User::find(Auth::user()->id);
                $user->update(['email_verified_at' => now()]);
                return redirect()->route('admin.dashboard');
            }
            return redirect()->back()->with('error', 'Nhập sai mật khẩu hoặc tên đăng nhập!');
        }

    }
}
