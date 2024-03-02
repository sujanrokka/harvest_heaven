@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        @include('components.header')


        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y  divide-gray-200">
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
                                Updated At
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


                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>
                            <!-- Add more header columns as needed -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y  divide-gray-200">

                        @foreach ($products as $index => $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ ++$index }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['created_at'] }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['updated_at'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['name'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <img src="{{ url('/') }}/storage/{{ $product['image'] }}" alt="" > --}}
                                    <img src="{{ url('/') }}/storage/{{ $product['image'] }}"  alt="" class="rounded-full">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['description'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['price'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product['action'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex justify-between">

                                    <a href="/editProduct/{{ $product['id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 cursor-pointer text-green-800 hover:text-blue-900">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="/deleteProduct/{{ $product['id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 cursor-pointer text-red-500 hover:text-red-900">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>


        @if (count($products) == 0)
            <center>No items found</center>
        @endif

    </body>

    </html>
@endauth
