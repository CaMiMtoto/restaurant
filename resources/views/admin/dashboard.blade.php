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
                        30
                    </h3>
                    <p class="text-gray-600">
                        Total Orders
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="bg-green-100 text-green-700 p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div>4% (30 days)</div>
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
                        29
                    </h3>
                    <p class="text-gray-600">
                        Total Delivered
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="bg-green-100 text-green-700 p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div>3% (30 days)</div>
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
                        6
                    </h3>
                    <p class="text-gray-600">
                        Total Cancelled
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="bg-red-100 text-red-700 p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                        <div>3% (30 days)</div>
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
                        RF 79,000
                    </h3>
                    <p class="text-gray-600">
                        Total Revenue
                    </p>
                    <div class="flex items-center gap-2 text-xs mt-3">
                        <div
                            class="bg-green-100 text-green-500 p-1 rounded-full h-6 w-6 flex items-center justify-center">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div>4% (30 days)</div>
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


                <div x-data="{ activeTab: 1 }" class="my-8">
                    <div class="flex justify-center bg-green-100 max-w-fit p-2 rounded mx-auto">
                        <div class="mr-6">
                            <button
                                class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                                :class="{ 'border-b-0 bg-white': activeTab === 1 }"
                                @click="activeTab = 1"
                            >
                                Monthly
                            </button>
                        </div>
                        <div class="mr-6">
                            <button
                                class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                                :class="{ 'border-b-0 bg-white': activeTab === 2 }"
                                @click="activeTab = 2"
                            >
                                Weekly
                            </button>
                        </div>
                        <div>
                            <button
                                class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                                :class="{ 'border-b-0 bg-white': activeTab === 3 }"
                                @click="activeTab = 3"
                            >
                                Today
                            </button>
                        </div>
                    </div>
                    <div class="py-4">
                        <div x-show="activeTab === 1">
                            <!-- Tab 1 content goes here -->
                            <div class="grid md:grid-cols-3 gap-4">
                                <div class="border border-gray-200 bg-white rounded-md p-4">
                                    <h1 class="font-semibold text-3xl mb-3">25</h1>
                                    <h5 class="text-gray-500 font-semibold">On Delivery</h5>
                                </div>
                                <div class="border border-gray-200 bg-white rounded-md p-4">
                                    <h1 class="font-semibold text-3xl mb-3">30</h1>
                                    <h5 class="text-gray-500 font-semibold">Delivered</h5>
                                </div>
                                <div class="border border-gray-200 bg-white rounded-md p-4">
                                    <h1 class="font-semibold text-3xl mb-3">5</h1>
                                    <h5 class="text-gray-500 font-semibold">Cancelled</h5>
                                </div>
                            </div>

                            <div class="grid lg:grid-cols-3 mt-10">
                                <div class="h-32">
                                    <canvas id="pieChart"></canvas>
                                </div>
                                <div class="flex flex-col gap-4 col-span-2">
                                    <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                                        <div class="w-28">On Delivery(41.67%)</div>
                                        <div class="flex rounded-full shrink-0 w-36 bg-gray-200 h-2">
                                            <div class="rounded-full bg-blue-800 w-3/4"></div>
                                        </div>
                                        <div class="w-[2rem] shrink-0">25</div>
                                    </div>
                                    <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                                        <div class="w-28">Delivered(50%)</div>
                                        <div class="flex rounded-full shrink-0 w-36 bg-gray-200 h-2">
                                            <div class="rounded-full bg-green-500 w-3/4"></div>
                                        </div>
                                        <div class="w-[2rem] shrink-0">30</div>
                                    </div>
                                    <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                                        <div class="w-28">Cancelled(8.33%)</div>
                                        <div class="flex rounded-full shrink-0 w-36 bg-gray-200 h-2">
                                            <div class="rounded-full bg-red-700 w-3/4"></div>
                                        </div>
                                        <div class="w-[2rem] shrink-0">5</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div x-show="activeTab === 2">
                            <!-- Tab 2 content goes here -->
                        </div>
                        <div x-show="activeTab === 3">
                            <!-- Tab 3 content goes here -->
                        </div>
                    </div>
                </div>


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
                    }, {
                        label: 'Profit',
                        data: [40000, 20000, 30000, 20000, 50000, 40000, 70000, 60000, 90000, 130000, 110000, 150000],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 3,
                        fill: true,
                        pointBorderWidth: 0,
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

            const data = {
                labels: [
                    'On Delivery',
                    'Delivered',
                    'Cancelled'
                ],
                datasets: [{
                    label: "My First Dataset",
                    data: [
                        25,
                        30,
                        5
                    ],
                    backgroundColor: [
                        'rgb(3,77,151)',
                        'rgb(50,179,84)',
                        'rgb(208,16,16)'
                    ],
                    hoverOffset: 10
                },
                ],

            };
            const config = {
                type: 'doughnut',
                data: data,
                responsive: true,
                options: {
                    plugins: {
                        legend: {
                            display: false,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        }
                    }
                }
            };
            let pieChart = new Chart(
                document.getElementById('pieChart'),
                config,
            );

        </script>
    @endpush

</x-app-layout>

