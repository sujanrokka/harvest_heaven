<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new Product') }}
        </h2>
    </x-slot>

    <div class="py-4 pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white flex justify-between align-middle  overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div class="w-full space-y-5">
                    <form action="{{ route('farmer.product.store') }}" method="POST" enctype="multipart/form-data"
                        class="w-full">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="name">Product Name</label>
                            <input id="name"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-2 bg-slate-200 outline-none px-3 block mt-1 w-full"
                                type="text" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <ul class="text-sm text-red-600 space-y-1 mt-1">
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="desc">Description</label>
                            <textarea id="desc"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-2 bg-slate-200 outline-none px-3 form-textarea block mt-1 w-full"
                                name="desc" rows="3" required>{{ old('desc') }}</textarea>
                            @error('desc')
                                <ul class="text-sm text-red-600 space-y-1 mt-1">
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="price">Price</label>
                            <input id="price"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-2 bg-slate-200 outline-none px-3 block mt-1 w-full"
                                type="number" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <ul class="text-sm text-red-600 space-y-1 mt-1">
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="image">Image</label>
                            <input id="image"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-2 bg-slate-200 outline-none px-3 block mt-1 w-full"
                                type="file" name="image" accept="image/*">
                            @error('image')
                                <ul class="text-sm text-red-600 space-y-1 mt-1">
                                    <li>{{ $message }}</li>
                                </ul>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add
                                Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
