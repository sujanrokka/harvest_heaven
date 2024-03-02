<x-app-layout>

    <x-slot name="header">
        <div class="flex space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Orders') }}
            </h2>
        </div>
    </x-slot>


    @if (session('success'))
        <div class="py-4 pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif



    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full text-left text-sm font-light rounded-md">
                    <thead class="border-b font-medium dark:border-neutral-500 bg-blue-700 text-white rounded-md">
                        <tr>
                            <th class="px-6 py-4">Order No</th>
                            <th class="px-6 py-4">Product ID</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Is Delivered</th>
                            <th class="px-6 py-4">Total</th>
                        </tr>
                    </thead>
                    <tbody class="border-2">
                        @php
                            $prevOrderNo = null; // Variable to track the previous order number
                            $totalPrice = 0; // Initialize total price variable
                        @endphp

                        @foreach ($orders as $index => $order)
                            <tr>
                                @if ($order->order_no != $prevOrderNo)
                                    <!-- Display the Order No if it's a new order -->
                                    <td rowspan="{{ $orders->where('order_no', $order->order_no)->count() }}"
                                        class="whitespace-nowrap px-6 py-4 font-bold text-lg">
                                        {{ $order->order_no }}
                                    </td>
                                    @php
                                        $prevOrderNo = $order->order_no; // Update previous order number
                                        $totalPrice = 0; // Reset total price for a new order group
                                    @endphp
                                @endif
                                <!-- Display other columns -->
                                <td class="whitespace-nowrap px-6 py-4">{{ $order->product->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $order->product->price }}</td>

                                @if ($index == count($orders) - 1 || $order->order_no != $orders[$index + 1]->order_no)
                                    <!-- If it's the last item of the order or a new order, display the total price -->
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if ($order->is_delivered == 0)
                                            <form action="{{ route('farmer.deliver.order', ['order' => $order->order_no]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-4 py-2 rounded-md">Deliver</button>
                                            </form>
                                        @else
                                            Delivered
                                        @endif
                                    </td>
                                @endif

                                @php
                                    $totalPrice += $order->product->price; // Accumulate product prices for the total
                                @endphp
                                @if ($index == count($orders) - 1 || $order->order_no != $orders[$index + 1]->order_no)
                                    <!-- If it's the last item of the order or a new order, display the total price -->
                                    <td class="whitespace-nowrap px-6 py-4 font-bold text-lg">
                                        <!-- Display the accumulated total price -->
                                        {{ $totalPrice }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>


                </table>

            </div>
        </div>
    </div>


    {{-- Weather WIDGET --}}

</x-app-layout>
