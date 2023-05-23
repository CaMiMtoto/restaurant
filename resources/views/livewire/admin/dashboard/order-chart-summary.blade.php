<div>
    <div x-data="{
    activeTab: 1,
 }" class="my-8">
        <div class="flex justify-center bg-green-100 max-w-fit p-2 rounded mx-auto">
            <div class="mr-6">
                <button
                    class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                    :class="{ 'border-b-0 bg-white': activeTab === 1 }"
                    @click="activeTab = 1"
                    wire:click="handleSelectedDays(30)"
                >
                    Monthly
                </button>
            </div>
            <div class="mr-6">
                <button
                    class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                    :class="{ 'border-b-0 bg-white': activeTab === 2 }"
                    @click="activeTab = 2"
                    wire:click="handleSelectedDays(7)"
                >
                    Weekly
                </button>
            </div>
            <div>
                <button
                    class="bg-white text-green-600 font-semibold py-2 px-6  rounded"
                    :class="{ 'border-b-0 bg-white': activeTab === 3 }"
                    @click="activeTab = 3" wire:click="handleSelectedDays(0)">
                    Today
                </button>
            </div>
        </div>
        <div class="py-4">
            <div>
                <!-- Tab 1 content goes here -->
                <div class="grid md:grid-cols-4 gap-4">
                    <div class="border border-gray-200 bg-white rounded-md p-4">
                        <h1 class="font-semibold text-3xl mb-3">
                            {{ number_format($pendingCount) }}
                        </h1>
                        <h5 class="text-gray-500 font-semibold">
                            Pending
                        </h5>
                    </div>
                    <div class="border border-gray-200 bg-white rounded-md p-4">
                        <h1 class="font-semibold text-3xl mb-3">
                            {{ number_format($processingCount) }}
                        </h1>
                        <h5 class="text-gray-500 font-semibold">
                            Processing
                        </h5>
                    </div>
                    <div class="border border-gray-200 bg-white rounded-md p-4">
                        <h1 class="font-semibold text-3xl mb-3">
                            {{ number_format($completedCount) }}
                        </h1>
                        <h5 class="text-gray-500 font-semibold">Completed</h5>
                    </div>
                    <div class="border border-gray-200 bg-white rounded-md p-4">
                        <h1 class="font-semibold text-3xl mb-3">
                            {{ number_format($declinedCount) }}
                        </h1>
                        <h5 class="text-gray-500 font-semibold">
                            Declined
                        </h5>
                    </div>
                </div>

                <div class="grid grid-cols-3 mt-10">
                    <div class="h-32">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="flex flex-col gap-4 col-span-2">
                        <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                            <div class="w-20 text-xs">Pending({{ round($pendingPercentage) }}%)</div>
                            <div class="flex rounded-full shrink-0 w-20 bg-gray-200 h-2">
                                <div class="rounded-full bg-blue-800"
                                     style="width: {{round($pendingPercentage)}}%"></div>
                            </div>
                            <div class="w-[2rem] shrink-0">
                                {{ number_format($pendingCount) }}
                            </div>
                        </div>
                        <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                            <div class="w-20 text-xs">Completed({{ number_format($completedPercentage) }}%)</div>
                            <div class="flex rounded-full shrink-0 w-20 bg-gray-200 h-2">
                                <div class="rounded-full bg-green-500"
                                     style="width: {{round($completedPercentage)}}%"></div>
                            </div>
                            <div class="w-[2rem] shrink-0">
                                {{ number_format($completedCount) }}
                            </div>
                        </div>
                        <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                            <div class="w-20 text-xs">Cancelled({{ $declinedPercentage }}%)</div>
                            <div class="flex rounded-full shrink-0 w-20 bg-gray-200 h-2">
                                <div class="rounded-full bg-red-700"
                                     style="width: {{round($declinedPercentage)}}%"></div>
                            </div>
                            <div class="w-[2rem] shrink-0">
                                {{ number_format($declinedCount) }}
                            </div>
                        </div>
                        <div class="flex text-sm font-semibold tracking-wide gap-4 items-center">
                            <div class="w-20 text-xs">Processing({{ $processingPercentage }}%)</div>
                            <div class="flex rounded-full shrink-0 w-20 bg-gray-200 h-2">
                                <div class="rounded-full bg-cyan-400"
                                     style="width: {{round($processingPercentage)}}%"></div>
                            </div>
                            <div class="w-[2rem] shrink-0">
                                {{ number_format($processingCount) }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- livewire/orders-summary-component.blade.php -->

        <script wire:ignore>
            // Fetch data from Livewire component properties
            let completedCount = @json($completedCount);
            let pendingCount = @json($pendingCount);
            let declinedCount = @json($declinedCount);
            let processingCount = @json($processingCount);

            document.addEventListener('livewire:load', function () {
                window.myPieChart = new Chart(
                    document.getElementById('pieChart'),
                    {
                        type: 'doughnut',
                        data: {
                            labels: [
                                'Pending',
                                'Completed',
                                'Declined',
                                'Processing'
                            ],
                            datasets: [
                                {
                                    label: 'Orders Summary',
                                    data: [
                                        pendingCount,
                                        completedCount,
                                        declinedCount,
                                        processingCount
                                    ],
                                    backgroundColor: [
                                        'rgb(3,77,151)',
                                        'rgb(50,179,84)',
                                        'rgb(208,16,16)',
                                        '#22D3EE'
                                    ],
                                    hoverOffset: 10
                                },
                            ],
                        },
                        responsive: false,
                        tooltips: {
                            enabled: true
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                    position: 'bottom',
                                    labels: {
                                        color: 'rgb(38,38,38)'
                                    }
                                }
                            }
                        }
                    },)

                Livewire.on('refreshChart', ({pending, completed, declined, processing}) => {
                    window.myPieChart.data.datasets[0].data = [pending, completed, declined, processing];
                    window.myPieChart.update();
                });
            });


        </script>

    </div>

</div>
