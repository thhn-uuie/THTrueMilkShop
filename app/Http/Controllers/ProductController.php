<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            dd($request);

            if ($request->has('file_upload')) {
                $file = $request->file('file_upload');
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('public/admin/img'), $file_name);
            }
            $request->merge(['image' => $file_name]);
            $data = Product::create([
                $request->all()
            ]);
            if ($data) {
                return redirect()->back()->with('success', 'Them moi thanh cong');
            }
        }
        return view('admin.product.create-product');
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
