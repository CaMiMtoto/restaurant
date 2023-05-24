<div>
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
                        {{ $selectedYear }}
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
                @foreach($years as $item)
                    <x-dropdown-link href="" wire:click.prevent="$set('selectedYear', {{ $item }})"
                                     class="font-semibold">
                        {{ $item }}
                    </x-dropdown-link>
                @endforeach
            </x-slot>
        </x-dropdown>
    </div>
    <div class="flex justify-center gap-6 items-center my-6">

        <div class="flex flex-col justify-center items-center">
            <div class="text-sm text-gray-500">
                <i class="fas fa-chart-simple text-primary"></i>
                Revenue
            </div>
            <div class="text-xl font-bold text-gray-700">RF {{ number_format($totalRevenue) }}</div>
        </div>
    </div>
    <canvas id="myChart"></canvas>

    <script wire:ignore>

        let chartData= @json($chartData);

        document.addEventListener('livewire:load', function () {
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
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:chartData.months,
                    datasets: [{
                        label: 'Revenue',
                        data: chartData.revenue,
                        backgroundColor: '#FDEDD7',
                        borderColor: '#F5A637',
                        borderWidth: 2,
                        fill: true,
                        pointBorderWidth: 0,
                        hoverBorderWidth: 1,
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

            Livewire.on('refreshRevenueChart', function (data) {
                console.log(data);
                myChart.data.datasets[0].data = data.revenue;
                myChart.update();
            });
        });

    </script>
</div>
