<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Profile;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $total = DB::table('gio_hang')
            ->where('id_user', Auth::user()->id)
            ->selectRaw('SUM(qty * price) as total')
            ->value('total');
        //        dd($total);
        $count = Cart::where('id_user', Auth::user()->id)->get();
        $galleries = collect();
        $qty = collect();
        foreach ($count as $item) {
            $qty->push(['id' => $item->id, 'id_product' => $item->id_product, 'qty' => $item->qty]);
            //            echo $qty;
            $idProducts = Gallery::where('id_product', $item->id_product)
                ->distinct('id_product')
                ->pluck('id_product');
            foreach ($idProducts as $idProduct) {
                //                echo $idProduct;
                $gallery = Gallery::where('id_product', $idProduct)->first();
                $galleries->push($gallery);
            }
        }
        $id = Auth::user()->id;
        if ($request->isMethod('POST')) {
            $data = Order::create([
                'id_user' => $id,
                'note' => $request->note?? '',
                'status'=> 'default',
                'name' => $request->name,
                'tel' => $request->tel,
                'add' => $request->addr,
            ]);
           

            if ($data) {
                $san_phams = Cart::where('id_user', $id)->get();
                $id_order = $data->id;
                foreach ($san_phams as $san_pham) {
                    OrderDetail::create([
                        'id_order' => $id_order,
                        'id_product' => $san_pham->id_product,
                        'price' => $san_pham->price,
                        'number_product' => $san_pham->qty
                    ]);
                    $san_pham->delete();
                }
                return view('frontend.user.checkout', compact(['total', 'galleries', 'qty']))->with('success', 'Them don hang thanh cong');
            }
        }

        

        return view('frontend.user.checkout', compact(['total', 'galleries', 'qty']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_item = Order::find($id);
        $order_details = OrderDetail::where('id_order', $id)->get();
        $allCost = 0;
        $user = Profile::where('id_user', ($order_item->id_user))->get()['0'];
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

    public function updateStatus(Request $request)
    {
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
        return redirect()->route('frontend.user.user_order')->with('success', 'Xoa thanh cong');
    }


    public function index()
    {
        $order = Order::all();
        if (Auth::user()->id_role == 1) {
            return view('admin.order.orders', compact('order'));
        }
        $order = Order::where('id_user', Auth::user()->id)->get();
        dd($order);
        return view('frontend.user.user_order', compact('order'));
    }
}
