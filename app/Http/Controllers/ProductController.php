<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

                foreach ($images as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $path = public_path('admin/img/product');
                    $image->move($path, $imageName);

                    $imageGallery = new Gallery();
                    $imageGallery->image = $imageName;
                    $imageGallery->id_product = $product->id;
                    $imageGallery->save();
                }

            } else {
                $defaultImage = 'no-image.png';
                $imageGallery = new Gallery();
                $imageGallery->image = $defaultImage;
                $imageGallery->id_product = $product->id;
                $imageGallery->save();
            }
            return redirect()->route('admin.product.product-detail', ['id' => $product->id])->with('success', 'Them moi thanh cong');



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
//        dd($product);
        if ($request->isMethod('POST')) {
            if ($request->hasFile("product_images")) {
                $files = $request->file("product_images");
                foreach ($files as $file) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('admin/img/product'), $imageName);
                    $imageGallery = new Gallery();
                    $imageGallery->image = $imageName;
                    $imageGallery->id_product = $product->id;
                    $imageGallery->save();
                }
            } else {
                $defaultImage = 'no-image.png';
                $imageGallery = new Gallery();
                $imageGallery->image = $defaultImage;
                $imageGallery->id_product = $product->id;
                $imageGallery->save();
            }
            return redirect()->route('admin.product.product-detail',['id'=>$product->id])->with('success', 'Chỉnh sửa thành công');
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

    public function deleteimage($id)
    {
        $images = Gallery::find($id);
        $fileDelete = public_path('admin/img/product') . '/' . $images->image;
        if (File::exists($fileDelete)) {
            File::delete($fileDelete);
        }
        $images->delete();
        return back();
    }

}
