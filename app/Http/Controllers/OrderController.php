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
                'note' => $request->note ?? '',
                'status' => '0',
                'name' => $request->name,
                'tel' => $request->tel,
                'add' => $request->addr,
                'order_date' => now(),
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

                $order = Order::where('id_user', Auth::user()->id)->get();
//                return view('frontend.user.user_order', compact('order'));

                return redirect()->route('user.order.orders', compact('order'));
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
        foreach ($order_details as $order_detail) {
            $allCost += $order_detail->price * $order_detail->number_product;
        }

        if (Auth::user()->id_role == 1) {
            return view('admin.order.order-detail', compact(['order_details', 'allCost', 'order_item']));
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

            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }

        return redirect()->back()->with('error', 'Không timg thấy đối tượng');
    }

    public function index_admin()
    {
        $order = Order::paginate(5);
        if (Auth::user()->id_role == 1) {
            return view('admin.order.orders', compact('order'));
        }

    }

    public function index_user()
    {
        $order = Order::where('id_user', Auth::user()->id)->get();
        return view('frontend.user.user_order', compact('order'));
    }

}
