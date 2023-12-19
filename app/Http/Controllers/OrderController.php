<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
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
        if (Auth::user()->id_role == 1) {
            return view('admin.order.order-detail', compact('order_item'));
        } else {
            return view('user.order.order-detail', compact('order_item'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $status1 = $order->status;
        if ($request->isMethod('POST')) {
            if (Auth::user()->id == $order->id_user) {
                if ($order->status < 2 && $request->status == 5) { // bi xoa boi nguoi dung khi chua duoc giao di
                    $status1 = 5;
                }
                $result = $order->update([
                    'note'=> $request->note,
                    'status'=> $request->status,
                ]);
                return view('user.order.order-update', compact('order'));

            }
            if (Auth::user()->id->id_role == 1) {
                if (!$request->status == 5) { //khong bi xoa boi nguoi dung
                    $status1 = 5;
                }
                $result = $order->update([
                    'status'=> $request->status,
                ]);

            }

        }
            if ($result) {
                return redirect()->route('user.order.orders')->with('success', 'Chỉnh sửa thành công');
            }
        return view('admin.order.order-update', compact('order'));
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
        return view('user.order.orders');
    }
}
    