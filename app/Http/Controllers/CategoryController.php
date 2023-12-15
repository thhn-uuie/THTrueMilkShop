<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {


//            if ($request->has('file_upload')) {
//                $file = $request->file('file_upload');
//                $file_name = $file->getClientOriginalName();
//                $file->move(public_path('public/admin/img'), $file_name);
//            }
//            $request->merge(['image' => $file_name]);
            $data = Category::create([
                'name_category' => $request->name,
                'image' => '123',
            ]);
            if ($data) {
                return redirect()->back()->with('success', 'Them moi thanh cong');
            }
        }
        return view('admin.category.create-category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
