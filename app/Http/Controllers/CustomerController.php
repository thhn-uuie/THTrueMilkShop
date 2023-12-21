<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function showProfile() {
        if(Auth::check()) {
//            $id = Auth::user()->id;
            return view('frontend.user.user_account');
        }
        return redirect('template');
    }

    public function update(Request $request) {
//        dd(Auth::user()->id);
        $customer = Profile::where('id_user', Auth::user()->id)->get()->first();
        $file_name= $customer->image;
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $file = $request->file('file_upload');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('frontend/img/profile'), $file_name);
            }

            $profile = $customer->update([
                'id_user'=>Auth::user()->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'birthday'=>$request->birthday,
                'address'=>$request->address,
                'image'=> $file_name,
            ]);
            return redirect()->route('user.user_account')->with('success', 'Chỉnh sửa thành công');
        }

        return view('frontend.user.user_account_update', compact('customer'));
    }
}
