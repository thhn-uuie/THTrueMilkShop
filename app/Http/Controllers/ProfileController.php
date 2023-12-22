<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::paginate(5);
        return view('admin.profile.profiles', compact('profile'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.profile-detail', ['profile'=>$profile]);
    }

    public function destroy(Request $request, string $id) {
        $profile = Profile::find($id);
        $user = User::where('id', $profile->id_user)->get();
        if($request->isMethod('POST')) {
            if ($user !== null) {
                return redirect()->route('admin.profile.profiles')->with('error', 'Không thể xóa hồ sơ này.');
            } else {
                $profile->delete();
                return redirect()->route('admin.profile.profiles')->with('success', 'Xóa hồ sơ thành công');
            }
        } else {
            return view('errors.405');
        }
    }
}
