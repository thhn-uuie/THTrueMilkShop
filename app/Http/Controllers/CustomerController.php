<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function showProfile()
    {
        if (Auth::check()) {
//            $id = Auth::user()->id;
            return view('frontend.user.user_account');
        }
        return redirect('template');
    }

    public function update(Request $request)
    {
        $customer = Profile::where('id_user', Auth::user()->id)->get()->first();
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $oldFile = public_path('frontend/img/profile') . '/' . $customer->image;
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                $file = $request->file('file_upload');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('frontend/img/profile'), $file_name);
                $request->merge(['image' => $file_name]);
            } else {
                $file_name = $customer->image;
                $request->merge(['image' => $file_name]);
            }
            $profile = $customer->update([
                'id_user' => Auth::user()->id,
                'name' => $request->name,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $file_name,
            ]);
            if ($profile) {
                return redirect()->route('user.user_account')->with('success', 'Cập nhật thành công');
            }
        }
        return view('frontend.user.user_account_update', compact('customer'));
    }

    public function detail($id) {
        $product = Product::find($id);
        return view('frontend.trang_chu.product_detail', compact('product'));
    }
}
