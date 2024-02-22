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

//    private function config() {
//        return [
//            'js' => [
//                'public/admin/js/custom.js',
//            ]
//        ];
//    }
    public function index()
    {
        $categories = Category::paginate(5);
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
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/category'), $file_name);
            }
            $request->merge(['image' => $file_name]);
            $category = Category::create($request->all());
            if ($category) {
                return redirect()->route('admin.category.category-detail', ['id' => $category->id])->with('success', 'Thêm mới thành công');
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
//        dd($this->config());
        $category = Category::find($id);
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $oldFile = public_path('admin/img/category') . '/' . $category->image;
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                $file = $request->file('file_upload');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/category'), $file_name);
                $request->merge(['image' => $file_name]);
            } else {
                $file_name = $category->image;
                $request->merge(['image' => $file_name]);

            }
            if ($request->status == 0) {
                $category->products()->update(['status' => 0]);
            }
            $result = $category->update($request->all());

            if ($result) {
                return redirect()->route('admin.category.categories')->with('success', 'Cập nhật danh mục thành công');
            }
        }
        return view('admin.category.category-update', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $category = Category::find($id);
            $oldFile = public_path('admin/img/category') . '/' . $category->image;
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
            if ($category->products()->count() > 0) {
                return redirect()->route('admin.category.categories')->with('error', 'Không thể xóa danh mục này.');
            } else {
                $category->delete();
                return redirect()->route('admin.category.categories')->with('success', 'Xóa danh mục thành công');
            }
        } else {
            return view('errors.405');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::where(function ($query) use ($search) {
            $query->where('name_category', 'like', "%$search%");
        })->paginate(5);

        $categories->appends(['search' => $search]); // Thêm tham số tìm kiếm vào liên kết phân trang

        return view('admin.category.categories', compact('categories', 'search'));
    }

}
