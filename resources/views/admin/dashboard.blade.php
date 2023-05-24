<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

            <div class="bg-white shadow-sm rounded-sm px-10 py-8 lg:px-6 lg:py-2 2xl:py-6  flex items-center   gap-6">
                <div
                    class="flex items-center justify-center  h-16 w-16  text-2xl font-semibold text-primary bg-primary/20 p-6 rounded-full">
                    <i class="fas fa-burger"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">
                        {{ number_format($totalOrders) }}
                    </h3>
                    <p class="text-gray-600">
                        Total Orders
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="{{ $last30DaysOrders>0?'bg-green-100 text-green-700':'bg-red-100 text-red-700' }} p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-{{ $last30DaysOrders>0?'up':'down' }}"></i>
                        </div>
                        <div>{{ round($last30DaysOrders) }} (30 days)</div>
                    </div>

                </div>
            </div>


            <div class="bg-white shadow-sm rounded-sm px-10 py-8 lg:px-6 lg:py-2 2xl:py-6  flex items-center   gap-6">
                <div
                    class="flex items-center justify-center  h-16 w-16 p-6 text-2xl font-semibold text-green-700 bg-green-700/20 rounded-full">
                    <i class="fas fa-truck-fast"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">
                        {{ number_format($totalCompletedOrders) }}
                    </h3>
                    <p class="text-gray-600">
                        Total Completed
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class=" {{ $last30DaysCompletedOrders>=0?'bg-green-100 text-green-700':'bg-red-100 text-red-700' }} p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-{{ $last30DaysCompletedOrders>=0?'up':'down' }}"></i>
                        </div>
                        <div>{{ round($last30DaysCompletedOrders) }} (30 days)</div>
                    </div>

                </div>
            </div>


            <div class="bg-white shadow-sm rounded-sm px-10 py-8 lg:px-6 lg:py-2 2xl:py-6  flex items-center   gap-6">
                <div
                    class="flex items-center justify-center  h-16 w-16 p-6 text-2xl font-semibold text-red-700 bg-red-700/20 rounded-full">
                    <i class="fas fa-cancel"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">
                        {{ number_format($totalDeclinedOrders) }}
                    </h3>
                    <p class="text-gray-600">
                        Total Cancelled
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="{{ $last30DaysDeclinedOrders>=0?'bg-green-100 text-green-700':'bg-red-100 text-red-700' }} p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-{{ $last30DaysDeclinedOrders>=0?'up':'down' }}"></i>
                        </div>
                        <div>{{ $last30DaysDeclinedOrders }} (30 days)</div>
                    </div>

                </div>
            </div>
            <div class="bg-white shadow-sm rounded-sm px-10 py-8 lg:px-6 lg:py-2 2xl:py-6  flex items-center   gap-6">
                <div
                    class="flex items-center justify-center  h-16 w-16 p-6 text-2xl font-semibold text-green-500 bg-green-500/10 rounded-full">
                    <i class="fas fa-dollar"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold">
                        RF {{ number_format($totalRevenue, 0) }}
                    </h3>
                    <p class="text-gray-600">
                        Total Revenue
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div>{{ number_format($last30DaysRevenue) }} (30 days)</div>
                    </div>

                </div>
            </div>


        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
            <div class="bg-white p-4 shadow-sm rounded-sm">
             <livewire:admin.dashboard.total-revenue-chart/>
            </div>
            <div class="bg-white p-4 shadow-sm rounded-sm">
                <div>
                    <h4 class="text-lg font-bold">
                        Orders Summary
                    </h4>
                    <p class="text-sm text-gray-500">
                        Summary of orders by status
                    </p>
                </div>
                <livewire:admin.dashboard.order-chart-summary/>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

        </script>
    @endpush

</x-app-layout>

