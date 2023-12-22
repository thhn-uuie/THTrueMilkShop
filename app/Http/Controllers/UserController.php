<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(5);
        return view('admin.user.users', compact('user'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validated = $request->validate([
                'name' => 'required|unique:users',
                'email' => 'required|unique:users|email',
                'password' => 'required',
            ]);

            $user = User::create($request->all());
            return redirect()->route('admin.user.user-detail', ['id' => $user->id]);

        }
        return view('admin.user.create-user');
    }

    public function show(string $id)
    {
        $user_item = User::find($id);
        return view('admin.user.user-detail', compact('user_item'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string',
                    Rule::unique('users')->ignore($id),
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($id),
                ],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $result = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($result) {
                return redirect()->route('admin.user.users')->with('success', 'Cập nhật tài khoản thành công');
            }
        }
        return view('admin.user.user-update', compact('user'));
    }

    public function update_password(Request $request)
    {
        $user = null;
        if ($request->isMethod('POST')) {
            
            $user = User::find(Auth::user()->id);
            if (!$user->password == $request->password) {
                return view('frontend.user.user_cpassword', compact('user'))->with('error', 'Mật khẩu cũ không đúng');
            }
            $validator = Validator::make($request->all(), [
                'new_password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*\d)(?=.*[A-Z]).*$/',
                ],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors('Mật khẩu phải có ít nhất 8 ký tự bao gồm chữ cái hoa, chữ số')->withInput();
            }
            $result = $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            if ($result) {
                return redirect()->route('user.user_account')->with('success', 'Cập nhật mật khẩu thành công');
            }
        }

        
        return view('frontend.user.user_cpassword', compact('user'));
    }


    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $user = User::find($id);
            if($user->id_role == 1) {
                return redirect()->route('admin.user.users')->with('error', 'Không thể xóa tài khoản admin');
            } else {
                $user->profile()->delete();
                $user->delete();
                return redirect()->route('admin.user.users')->with('success', 'Xóa tài khoản thành công');
            }
        } else {
            return view('errors.405');
        }
    }
}
