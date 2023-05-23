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

    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $this->retrieveTheOrderCountsFromYourDataSource();
        return view('livewire.admin.dashboard.order-chart-summary');
    }

    /**
     * @return void
     */
    public function retrieveTheOrderCountsFromYourDataSource(): void
    {
        $toDateString = now()->subDays($this->selectedDays)->toDateString();
        $this->totalOrders = $this->getOrdersCount(null);
        $this->completedCount = $this->getOrdersCount(Order::STATUS_COMPLETED);
        $this->pendingCount = $this->getOrdersCount(Order::STATUS_PENDING);
        $this->declinedCount = $this->getOrdersCount(Order::STATUS_DECLINED);
        $this->processingCount = $this->getOrdersCount(Order::STATUS_PROCESSING);

        $this->pendingPercentage = $this->totalOrders ? round($this->pendingCount / $this->totalOrders * 100) : 0;
        $this->completedPercentage = $this->totalOrders ? round($this->completedCount / $this->totalOrders * 100) : 0;
        $this->declinedPercentage = $this->totalOrders ? round($this->declinedCount / $this->totalOrders * 100) : 0;
        $this->processingPercentage = $this->totalOrders ? round($this->processingCount / $this->totalOrders * 100) : 0;
    }

    private function getOrdersCount($status): int
    {
        $toDateString = now()->subDays($this->selectedDays)->toDateString();
        return Order::query()
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->whereDate('created_at', '>=', $toDateString)
            ->count();
    }
}
