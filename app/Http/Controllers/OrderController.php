<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */public function store(Request $request)
    {
        dd(Auth::user()->id);
        $id = Auth::user()->id;
        if ($request->isMethod('POST')) {
            $data = Order::create([
            'id_user' => $id,
            'note'=> $request->note,
            'order_date'=> $request->order_date,
            'status' => $request->status,
            ]);
        }
        if ($data) {
            return redirect()->route('user.order.order-detail', ['id'=>$data->id])->with('success', 'Them don hang thanh cong');
        }
        return view('user.create-order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_item = Order::find($id);
        $order_details = OrderDetail::where('number_product', $id);
        $allCost = 0;
        foreach ($order_details as $order_detail) {
            $allCost += $order_detail->price * $order_detail->number_product;
        }
        if (Auth::user()->id_role == 1) {
            return view('admin.order.order-detail', compact(['order_item','order_details', 'allCost']));
        } else {
            return view('user.order.order-detail', compact(['order_item','order_details', 'allCost']));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if ($request->isMethod('POST')) {
            if (Auth::user()->id->id_role == 1) {
                $result = $order->update([
                    'status'=> $request->status,
                ]);
                if ($result) {
                    return view('admin.order.orders');
                }
                return view('admin.order.order-update', compact('order'))->with('success', 'Cap nhat trang thai don hang thanh cong');;
            }

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('user.order.orders')->with('success', 'Xoa thanh cong');
    }


    public function index()
    {
        if (Auth::user()->id_role == 1) {
            return view('admin.order.orders');
        }
        return view('user.order.orders');
    }
}
    