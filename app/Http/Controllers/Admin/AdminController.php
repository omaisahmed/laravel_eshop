<?php

namespace App\Http\Controllers\Admin;

use App\Charts\GraphsChartjs;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Orders;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $category = Category::count();
        $product = Products::count();
        $orders = Orders::orderBy('created_at','DESC')->get()->take(5);
        $totalSales = Orders::status('paid')->count();
        $totalRevenue = Orders::status('paid')->sum('amount');
        $todaySales = Orders::status('paid')->today()->count();
        $todayRevenue = Orders::status('paid')->today()->sum('amount');

        $today_sales = Orders::status('paid')->today()->count();
        $yesterday_sales = Orders::status('paid')->whereDate('created_at', Carbon::today()->subDays(1))->count();
        $sales_2_days_ago = Orders::status('paid')->whereDate('created_at', Carbon::today()->subDays(2))->count();
        $today_sales_chart = new GraphsChartjs;
        $today_sales_chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $today_sales_chart->dataset('Sales', 'bar', [$sales_2_days_ago, $yesterday_sales, $today_sales])->options([
            'color' => '#F9FCF9',
            'backgroundColor' => '#F9FCF9',
            'responsive' => true,
            'scaleFontColor' => '#ffffff',
            'pointLabelFontColor' => '#FFFFFF',
        ]);

        $monthly_revenue = Orders::status('paid')->whereDate('created_at', Carbon::now('m'))->sum('amount');
        $monthly_revenue_chart = new GraphsChartjs;
        $monthly_revenue_chart->labels(['Monthly']);
        $monthly_revenue_chart->dataset('Revenue', 'bar', [$monthly_revenue])->options([
            'color' => '#F9FCF9',
            'backgroundColor' => '#F9FCF9',
            'responsive' => true
        ]);

        $monthly_sales = Orders::status('paid')->whereDate('created_at', Carbon::now('m'))->count();
        $monthly_sales_chart = new GraphsChartjs;
        $monthly_sales_chart->labels(['Monthly']);
        $monthly_sales_chart->dataset('Sales', 'bar', [$monthly_sales])->options([
            'color' => '#F9FCF9',
            'backgroundColor' => '#F9FCF9',
            'animation' => false,
            'responsive' => true
        ]);
        return view('dashboard.frontend.index', compact('category','product','orders','totalSales','totalRevenue','todaySales','todayRevenue','users','today_sales_chart','monthly_revenue_chart','monthly_sales_chart'));
    }
}
