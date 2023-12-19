<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Profile;
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
        $order_details = OrderDetail::where('id_order', $id)->get();
        $allCost = 0;
        $user = Profile::where('id_user',($order_item->id_user))->get()['0'];
        foreach ($order_details as $order_detail) {
            $allCost += $order_detail->price * $order_detail->number_product;
        }

        if (Auth::user()->id_role == 1) {
            return view('admin.order.order-detail', compact(['order_details', 'allCost', 'user', 'order_item']));
        } else {
            return view('user.order.order-detail', compact(['order_item', 'allCost', 'user']));
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateStatus(Request $request) {
//        dd($request);
        $orderId = $request->id;
        $status = $request->status;

        $order = Order::find($orderId);
//        dd($order);
        if ($order) {
            $order->status = $status;
            $order->save();

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Object not found');

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
        $order = Order::all();
        if (Auth::user()->id_role == 1) {
            return view('admin.order.orders', compact('order'));
        }
        return view('user.order.orders', compact('order'));
    }
}
