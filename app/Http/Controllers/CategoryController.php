<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            if ($request->has('file_upload')) {
                $file = $request->file('file_upload');
                $file_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/category'), $file_name);
            }
            $request->merge(['image' => $file_name]);
            $category = Category::create($request->all());
            if ($category) {

                return view('admin.category.category-detail')->with('success', 'Them moi thanh cong')->with('category_item', $category);;
            }
        }
        return view('admin.category.create-category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category_item = Category::find($id);
        return view('admin.category.category-detail', compact('category_item'));
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
        $category = Category::find($id);
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $oldFile = public_path('admin/img/category') . '/' . $category->image;
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                $file = $request->file('file_upload');
                $file_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/category'), $file_name);
                $request->merge(['image' => $file_name]);
            } else {
                    $file_name = $category->image;
                    $request->merge(['image' => $file_name]);

            }
            $result = $category->update($request->all());

            if ($result) {
                return redirect()->route('admin.category.categories')->with('success', 'Chỉnh sửa thành công');
            }
        }
        return view('admin.category.category-update', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $deleteImg = Storage::delete($category->image);
        $category->delete();
        return redirect()->route('admin.category.categories')->with('success', 'Xoa thanh cong');
    }
}
