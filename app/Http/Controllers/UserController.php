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
    public function index() {
        $user = User::all();
        return view('admin.user.users', compact('user'));
    }

    public function store(Request $request) {
        if ($request->isMethod('POST')) {
            $user = User::create($request->all());
            if ($user) {
                return redirect()->route('admin.user.user-detail', ['id'=>$user->id]);
            }
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
//        $otherUsers = User::whereNotIn('id', [$user->id])->get();
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
                return redirect()->route('admin.user.users')->with('success', 'Chỉnh sửa thành công');
            }
        }
        return view('admin.user.user-update', compact('user'));
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.users')->with('success', 'Xoa thanh cong');
    }
}
