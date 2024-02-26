<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductImages;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('created_by', Auth::id())->paginate(5);
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
            $product->created_at = Carbon::now();
            $product->created_by = Auth::user()->id;
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
                $defaultImage = 'no-image.jpg';
                $imageGallery = new Gallery();
                $imageGallery->image = $defaultImage;
                $imageGallery->id_product = $product->id;
                $imageGallery->save();
            }
            return redirect()->route('admin.product.product-detail', ['id' => $product->id])->with('success', 'Thêm mới thành công');

        }
        return view('admin.product.create-product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_item = Product::find($id);
        if (!$product_item || $product_item->created_by !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        return view('admin.product.product-detail', compact('product_item'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product || $product->created_by !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $old_price = $product->price;

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
//                    $gallery = Gallery::where('id_product', $id)
//                        ->where('image', 'no-image.jpg')
//                        ->first();
//                    $gallery->delete();
                }
            } else {
                $gallery = Gallery::where('id_product', $product->id)->first();
                if (!$gallery) {
                    $imageGallery = new Gallery();
                    $imageGallery->image = 'no-image.jpg';
                    $imageGallery->id_product = $product->id;
                    $imageGallery->save();
                }
            }

            $productUp = $product->update([
                'name_product' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'id_category' => $request->category,
                'status' => $request->status,
            ]);

            if ($old_price !== $request->price) {
                Cart::where('id_product', $product->id)->update([
                    'price' => $request->price
                ]);
            }
            return redirect()->route('admin.product.product-detail', ['id' => $product->id])->with('success', 'Cập nhật sản phẩm thành công');
        }
        return view('admin.product.product-update', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $product = Product::find($id);
            foreach ($product->image as $item) {
                if ($item->image != 'no-image.jpg') {
                    $oldFile = public_path('admin/img/product') . '/' . $item->image;
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
            // Xoa het trong gio hang va order
//        OrderDetail::where('id_product', $id)->delete();
//        Cart::where('id_product', $id)->delete();
//        $orderDetail = OrderDetail::where('id_product', $id)->get();
//        $order = Order::where('id')

            if ($product->orders()->count() > 0) {
                return redirect()->route('admin.product.products')->with('error', 'Không thể xóa sản phẩm này.');
            } else {
                $product->delete();
                return redirect()->route('admin.product.products')->with('success', 'Xóa sản phẩm thành công.');
            }
        } else {
            return view('errors.405');
        }
    }

    public function deleteimage($id)
    {
        $image = Gallery::find($id);

        if ($image->image != 'no-image.jpg') {
            $fileDelete = public_path('admin/img/product') . '/' . $image->image;
            if (File::exists($fileDelete)) {
                File::delete($fileDelete);
            }
        }

        $image->delete();
        return back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where(function ($query) use ($search) {
            $query->where('name_product', 'like', "%$search%");
        })
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name_category', 'like', "%$search%");
            })
            ->paginate(5);

        $products->appends(['search' => $search]); // Thêm tham số tìm kiếm vào liên kết phân trang

        return view('admin.product.products', compact('products', 'search'));
    }
}
