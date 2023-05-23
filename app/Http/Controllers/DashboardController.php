<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Calculate the date 30 days ago
        $thirtyDaysAgo = now()->subDays(30);
        // Get the total orders count
        $totalOrders = Order::count();
        $totalCompletedOrders = Order::where('status', Order::STATUS_COMPLETED)->count();
        $totalDeclinedOrders = Order::where('status', Order::STATUS_DECLINED)->count();
        // Get the count of orders in the last 30 days
        $last30DaysOrders = Order::where('created_at', '>=', $thirtyDaysAgo)->count();
        $last30DaysCompletedOrders = Order::where('status', Order::STATUS_COMPLETED)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->count();
        $last30DaysDeclinedOrders = Order::where('status', Order::STATUS_DECLINED)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->count();

        $totalRevenue = Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('status', Order::STATUS_COMPLETED)
            ->sum(DB::raw('order_items.qty * order_items.price'));
        $last30DaysRevenue = Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('status', Order::STATUS_COMPLETED)
            ->where('orders.created_at', '>=', $thirtyDaysAgo)
            ->sum(DB::raw('order_items.qty * order_items.price'));


        return view('admin.dashboard', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalCompletedOrders' => $totalCompletedOrders,
            'totalDeclinedOrders' => $totalDeclinedOrders,
            'last30DaysOrders' => $last30DaysOrders,
            'last30DaysCompletedOrders' => $last30DaysCompletedOrders,
            'last30DaysDeclinedOrders' => $last30DaysDeclinedOrders,
            'last30DaysRevenue' => $last30DaysRevenue,
        ]);
    }
}
