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
    
}
