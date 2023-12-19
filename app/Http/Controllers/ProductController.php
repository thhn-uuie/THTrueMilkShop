<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(3);
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
//dd($request);

//        dd($product);
        if ($request->isMethod('POST')) {
            $product = new Product();
            $product->name_product = $request->title;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->id_category = $request->category;
            $product->status = $request->status;
            $product->save();
            if ($request->hasFile('product_images')) {
                $images = $request->file('product_images');
                foreach ($images as $key => $image) {

                    $manager = new ImageManager(new Driver());
                    $image_temp = $manager->read($image);
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $path = public_path('admin/img/product');
                    $image->move($path, $imageName);
                    $manager->create(100, 100);

                    $imageGallery = new Gallery();
                    $imageGallery->image = $imageName;
                    $imageGallery->id_product = $product->id;
                    $imageGallery->save();
                }

            }
            if ($product) {
                return redirect()->route('admin.product.product-detail', ['id' => $product->id])->with('success', 'Them moi thanh cong');
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
        $product = Product::with('images')->find($id);
        if ($request->isMethod('POST')) {
            if ($request->has('product')) {
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
