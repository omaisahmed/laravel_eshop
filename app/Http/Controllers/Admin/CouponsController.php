<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCouponRequest;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupons::all();
        return view('dashboard.coupons.index',compact('coupons'));
    }
    
    public function create_coupon()
    {
        return view('dashboard.coupons.create');
    }
    public function create_coupon_submit(CreateCouponRequest $request)
    {
        $coupon = new Coupons();
        $coupon->code = $request->code;
        $coupon->percent = $request->percent;
        $coupon->usage = 0;
        $coupon->save();
        return redirect()->route('coupon.index')->with('create_coupon', 'Coupon Created Successfully!');
    }
    public function delete_coupon($id)
    {
        $coupon = Coupons::find($id);
        $coupon->delete();
        return redirect()->back()->with('delete_coupon','Coupon Deleted Successfully!');
    }
}
