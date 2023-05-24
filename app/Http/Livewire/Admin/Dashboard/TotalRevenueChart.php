<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use DateInterval;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalRevenueChart extends Component
{
    public $years = [];
    public $selectedYear = null;

    public $chartData = [];
    public $totalRevenue = 0;

    public function mount(): void
    {
        $this->years = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) AS year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');
        $this->selectedYear = $this->years->first();
        $this->updateChartData();
    }


    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.dashboard.total-revenue-chart');
    }

    public function updateChartData(): void
    {
        $revenueByMonth = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(DB::raw('MONTH(orders.created_at) AS month'), DB::raw('SUM(order_items.qty*order_items.price) AS total_revenue'))
            ->whereYear('orders.created_at', $this->selectedYear)
            ->where('orders.status', Order::STATUS_COMPLETED)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Create an array with month keys and initialize revenue to zero for each month
        $revenueData = array_fill_keys(range(1, 12), 0);

        // Loop through the revenue data and add the revenue to the appropriate month
        foreach ($revenueByMonth as $revenue) {
            $revenueData[$revenue->month] = $revenue->total_revenue;
        }

        $this->chartData = [
            'months' => array_keys($revenueData),
            'revenue' => array_values($revenueData),
        ];
        // convert month number to short month name
        $this->chartData['months'] = array_map(function ($monthNumber) {
            return DateTime::createFromFormat('!m', $monthNumber)->format('M');
        }, $this->chartData['months']);

        $this->totalRevenue = array_sum($this->chartData['revenue']);
    }

    public function updatedSelectedYear(): void
    {
        $this->updateChartData();
        $this->emit('refreshRevenueChart', $this->chartData);
    }
}
