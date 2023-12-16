<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $file = $request->file('file_upload');
                $file_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/product'), $file_name);
            }
            $request->merge(['image' => $file_name]);
            $data = Product::create([
                'name_product' => $request->title,
                'price' => $request->price,
                'image' => $request->image,
                'description' => $request->description,
                'id_category' => $request->category,
                'status' => $request->status,
            ]);
            if ($data) {
                return redirect()->route('admin.product.product-detail', ['id'=>$data->id])->with('success', 'Them moi thanh cong');
            }
        }
        return view('admin.product.create-product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_item = Product::find($id);
        return view('admin.product.product-detail', compact('product_item'));
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
        $product = Product::find($id);
        if ($request->isMethod('POST')) {
            if ($request->has('file_upload')) {
                $oldFile = public_path('admin/img/product') . '/' . $product->image;
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                $file = $request->file('file_upload');
                $file_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/img/product'), $file_name);
                $request->merge(['image' => $file_name]);
            } else {
                $file_name = $product->image;
                $request->merge(['image' => $file_name]);

            }
            $result = $product->update([
                'name_product' => $request->title,
                'price' => $request->price,
                'image' => $request->image,
                'description' => $request->description,
                'id_category' => $request->category,
                'status' => $request->status,
            ]);

            if ($result) {
                return redirect()->route('admin.product.products')->with('success', 'Chỉnh sửa thành công');
            }
        }
        return view('admin.product.product-update', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $oldFile = public_path('admin/img/product') . '/' . $product->image;
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }
        $product->delete();
        return redirect()->route('admin.product.products')->with('success', 'Xoa thanh cong');
    }
}
