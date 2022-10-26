<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('dashboard.orders.index',compact('orders'));
    }

    public function view_order($id){
        if(Orders::where('id',$id)->exists()){
            $order = Orders::find($id);
            return view('dashboard.orders.view',compact('order'));
        }
        else{
            return redirect()->back()->with('status','No Order Found!');
        }      
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

    public function invoice_order($id)
    {
        $order = Orders::findOrFail($id);
        $pdf = PDF::loadView('dashboard.orders.invoice', ['order'=>$order]);
        return $pdf->download('order-invoice.pdf');
    }
}
