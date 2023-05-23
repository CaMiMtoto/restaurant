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
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="text-lg font-bold">Revenue</h4>
                        <p class="text-sm text-gray-500">Total Revenue by month</p>
                    </div>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-primary/20 text-sm leading-4 font-medium rounded-sm bg-primary/10 text-primary focus:outline-none transition ease-in-out duration-150">
                                <div class="font-semibold">
                                    <i class="fas fa-calendar mr-1"></i>
                                    Last 7 days
                                </div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="" class="font-semibold">
                                Last 7 days
                            </x-dropdown-link>
                            <x-dropdown-link href="" class="font-semibold">
                                Last 2 weeks
                            </x-dropdown-link>
                            <x-dropdown-link href="" class="font-semibold">
                                1 month
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="flex justify-center gap-6 items-center my-6">
                    <div class="flex flex-col justify-center items-center">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-chart-simple text-pink-500"></i>
                            Profit
                        </div>
                        <div class="text-xl font-bold text-gray-700">RF 79,000</div>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-chart-simple text-primary"></i>
                            Revenue
                        </div>
                        <div class="text-xl font-bold text-gray-700">RF 19,000</div>
                    </div>
                </div>

                <canvas id="myChart"></canvas>
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
            function formatKMB(num) {
                if (num < 1000) {
                    return num.toString();
                } else if (num < 1000000) {
                    return (num / 1000).toFixed(1) + 'K';
                } else if (num < 1000000000) {
                    return (num / 1000000).toFixed(1) + 'M';
                } else if (num < 1000000000000) {
                    return (num / 1000000000).toFixed(1) + 'B';
                } else {
                    return (num / 1000000000000).toFixed(1) + 'T';
                }
            }

            function generateRandomData(min = 10000, max = 12000) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            let ctx = document.getElementById('myChart');
            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [20000, 30000, 40000, 50000, 60000, 70000, 60000, 90000, 130000, 110000, 130000, 150000],
                        backgroundColor: 'rgba(245,166,55,0.3)',
                        borderColor: 'rgba(245,166,55,1)',
                        borderWidth: 3,
                        fill: true,
                        pointBorderWidth: 0,
                        hoverBorderWidth: 10,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true
                            },
                            ticks: {
                                callback: function (value, index, values) {
                                    return formatKMB(value);
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    elements: {
                        line: {
                            tension: 0.4,
                        }
                    },
                },
            });



        </script>
    @endpush

</x-app-layout>

