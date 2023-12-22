<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use Illuminate\Support\Str;
use App\Mail\ChangePassWordMail;

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
        $this->logout($request);
        $validated = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $user = null;
        try {
            $token = Str::random(8);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_token'=>$token
            ]);
        
            Mail::to($request->email)->send(new Hello($request->name,  $token));  
        } catch (\Throwable $th) {
            dd($th);
            $user->delete();
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
                return redirect()->route('template');
            }
            return redirect()->back()->with('error', 'Nhập sai mật khẩu hoặc tên đăng nhập!');
        }
        
    }

    public function forget_password(Request $request) {
        $hasAuth = null;
        if ($request->isMethod('GET')) {
            return view('frontend.auth.fpassword', compact('hasAuth'));
        }
        if ($request->action == "enter") {
            try {
                $email =  $request->email;
                $token = Str::random(8);
                $user = User::where('email', $request->email)->get()->first();
                $user->update([
                    'email_token' => $token,
                ]);
                
                Mail::to($user->email)->send(new ChangePassWordMail($request->name,  $token));  
                $hasAuth = 1;
                return view('frontend.auth.fpassword', compact(['hasAuth', 'email']));
            } catch (\Throwable $th) {
                return view('frontend.auth.fpassword', compact(['hasAuth']))->with('error', 'Email này không tồn tại trong hệ thống!');
            }
        } else {
            
            $user = User::where('email', $request->email)->get()->first();
            if (!$request->token == $user->email_token) {
                $hasAuth = 1;
                return view('frontend.auth.fpassword', compact(['hasAuth']))->with('error', 'Mã xác nhận không chính xác');
            }
            if (!$request->c_password == $request->c_password) {
                $hasAuth = 1;
                return view('frontend.auth.fpassword', compact(['hasAuth']))->with('error', 'Mật khẩu không khớp');
            }
            $user->update([
                'password' => Hash::make($request->password),

            ]);
            return view('frontend.auth.fpassword', compact(['hasAuth']))->with('succed', 'Đổi mật khẩu thành công');
    
        }
        
    }
}
