<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('dashboard.orders.index',compact('orders'));
    }

    public function delete_order($id){
        $order = Orders::find($id);
        $order->delete();
        return redirect()->back()->with('delete_order','Order Deleted Successfully!');
    }

    public function order_status(Request $request){
        $order = Orders::find($request->id);
        $order->status = $request->status;
        $order->update();
    }
}
