<x-app-layout>
    <x-slot name="header">
        <div class="flex space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Buyer Dashboard') }}
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
            <div class="py-3 mb-5">
                <a href="{{ route('buyer.view.cart') }}" class="bg-blue-500 text-white p-2 rounded-md w-fit">Cart &nbsp;
                    <span class="p-1 rounded-md bg-white px-2 text-black">{{ $cart_count }}</span>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($farmers as $farmer)
                    <div class="p-2 bg-green-600 text-white mb-2 rounded-md">
                        <div class="uppercase text-lg"> Products from <b class="font-bold"> {{ $farmer->name }} </b>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 ">
                        @foreach ($farmer->product as $product)
                            <div class="max-w-xs rounded overflow-hidden shadow-lg">
                                <img class="w-full h-48" src="{{ asset('images/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                                    <p class="text-gray-700 text-base">{{ $product->desc }}</p>
                                    <p class="text-gray-700 text-base">Price: ${{ $product->price }}</p>
                                </div>
                                <div class="px-6 py-4">
                                    <form action="{{ route('buyer.add.cart', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
