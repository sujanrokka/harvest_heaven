<x-app-layout>
    <x-slot name="header">
        <div class="flex space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Cart') }}
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

      @if (session('error'))
        <div class="py-4 pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Error!!</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full  sm:px-6 lg:px-8">
                            <div class="overflow-hidden">


                                <table class="min-w-full text-left text-sm font-light rounded-md">
                                    <thead
                                        class="border-b font-medium dark:border-neutral-500 bg-blue-700 text-white rounded-md">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Product Name</th>
                                            <th scope="col" class="px-6 py-4">Desc</th>
                                            <th scope="col" class="px-6 py-4">Price</th>
                                            <th scope="col" class="px-6 py-4">Image</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-2">
                                        @foreach ($cartItems as $product)
                                            <tr
                                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    {{ $loop->iteration }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $product->product->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $product->product->desc }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $product->product->price }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    @if ($product->product->image)
                                                        <a href="{{ asset('images/' . $product->product->image) }}"
                                                            data-lightbox="product"
                                                            data-title="{{ $product->product->name }}">
                                                            <img src="{{ asset('images/' . $product->product->image) }}"
                                                                alt="Product Image"
                                                                class="w-12 h-12 object-cover rounded-full">
                                                        </a>
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('buyer.delete.cart', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 text-white p-2 rounded-md">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        @if ($cartItems)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('buyer.place.order') }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit"
                                                            class="bg-red-500 text-white p-2 rounded-md">Place Order</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    </tfoot>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
