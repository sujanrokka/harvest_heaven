@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>View Orders</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        @include('components.header')


        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order By
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">


                        @foreach ($products as $index => $product)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-400 text-white' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Order no {{ ++$index }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['created_at'] }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img width="100%" src="{{ url('/') }}/storage/{{ $product->product->image }}">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product->price }}
                                </td>

                                @if ($product->has_deliver == 0)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/deliverOrders/{{ $product->id }}"
                                            class="px-3 py-1 bg-blue-500 rounded-md ">Delivered</a>
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/orderBill/{{ $product->id }}"
                                            class="px-3 py-1 bg-blue-500 rounded-md ">View Bill</a>
                                    </td>
                                @endif


                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </body>

    </html>
@endauth
