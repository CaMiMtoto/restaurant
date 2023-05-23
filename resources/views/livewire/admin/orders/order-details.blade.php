<div>
    @if(!is_null($order))
        <x-modal name="order-details" :show="$order">
            <div class="p-6">
                <x-modal-title title="Order Details"/>
                <div class="mt-3">
                    <h1 class="text-sm font-semibold">
                        Customer Details
                    </h1>
                </div>

                <div class="mt-3">
                    <div class="flex flex-col gap-4">
                        <div>
                            <span class="text-gray-500">Date:</span>
                            <span class="text-gray-700">{{ $order->created_at->format('d M Y , H:i') }}</span>
                        </div>

                        <div>
                            <span class="text-gray-500">Customer Name:</span>
                            <span class="text-gray-700">{{ $order->customer_name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Customer Phone:</span>
                            <span class="text-gray-700">{{ $order->customer_phone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Customer Email:</span>
                            <span class="text-gray-700">{{ $order->customer_email??'' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Status:</span>
                            <x-app-label :color="$order->statusColor" class="capitalize">
                                {{ $order->status }}
                            </x-app-label>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <h1 class="text-sm font-semibold">Order Items</h1>
                </div>

                <div class="mt-3 border-2 border-dotted rounded-md overflow-hidden">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Item Name</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($order->orderItems as $item)
                            <tr class="bg-white border-t hover:bg-gray-50" wire:key="tr{{$item->id}}">
                                <td class="px-6 py-4">
                                    {{ $item->item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->qty }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($item->price) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($item->total) }}
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white ">
                                <td colspan="7" class="px-6 py-4 text-center">
                                    <x-alert-info message="No items found"/>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 text-end">
                    <span class="text-gray-500">Total:</span>
                    <span class="text-gray-700 font-semibold">RWF {{ number_format($order->total) }}</span>
                </div>


                <div class="mt-3">
                    <span class="text-gray-500">Note:</span>
                    <div class="text-gray-700">{{ $order->note }}</div>
                </div>

                <div class="mt-3">
                    <x-input-label value="Order Status"/>
                    <div class="mt-1">
                        <select wire:model="status" wire:change="updateStatus"
                                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            <option value="">Update Status</option>
                            @foreach(\App\Models\Order::statuses() as $status)
                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="my-3">
                    <x-alerts/>
                </div>
            </div>
        </x-modal>
    @endif
</div>
