<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class OrderChartSummary extends Component
{
    public $completedCount;
    public $pendingCount;
    public $declinedCount;

    public $processingCount;
    public $totalOrders;
    public $pendingPercentage;
    public $completedPercentage;
    public $declinedPercentage;
    public $processingPercentage;
    public $selectedDays = 30;

    public function handleSelectedDays($days): void
    {
        $this->selectedDays = $days;
        $this->retrieveTheOrderCountsFromYourDataSource();
        $this->emit('refreshChart', [
            'pending' => $this->pendingPercentage,
            'completed' => $this->completedPercentage,
            'declined' => $this->declinedPercentage,
            'processing' => $this->processingPercentage,
        ]);
    }

    public function mount(): void
    {
        // Retrieve the order counts from your data source
        $this->retrieveTheOrderCountsFromYourDataSource();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.dashboard.order-chart-summary');
    }

    /**
     * @return void
     */
    public function retrieveTheOrderCountsFromYourDataSource(): void
    {
        $orderCounts = $this->getGroupedOrders();
        $this->totalOrders = array_sum($orderCounts);
        $this->completedCount = $orderCounts[Order::STATUS_COMPLETED] ?? 0;
        $this->pendingCount = $orderCounts[Order::STATUS_PENDING] ?? 0;
        $this->declinedCount = $orderCounts[Order::STATUS_DECLINED] ?? 0;
        $this->processingCount = $orderCounts[Order::STATUS_PROCESSING] ?? 0;

        $this->pendingPercentage = $this->totalOrders ? round($this->pendingCount / $this->totalOrders * 100) : 0;
        $this->completedPercentage = $this->totalOrders ? round($this->completedCount / $this->totalOrders * 100) : 0;
        $this->declinedPercentage = $this->totalOrders ? round($this->declinedCount / $this->totalOrders * 100) : 0;
        $this->processingPercentage = $this->totalOrders ? round($this->processingCount / $this->totalOrders * 100) : 0;
    }

    private function getGroupedOrders(): array
    {
        $toDateString = now()->subDays($this->selectedDays)->toDateString();
        return Order::query()
            ->whereDate('created_at', '>=', $toDateString)
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    }
}
