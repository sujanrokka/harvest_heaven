<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Farmer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-1 grid-rows-1 md:grid-cols-2 p-5 space-x-5">
                    <a href="{{ route('farmer.view.order') }}" class="mr-4 block rounded-lg bg-green-400  dark:bg-neutral-700">
                        <div class="p-6">
                            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                View Order
                            </h5>
                        </div>
                    </a>

                    <a href="{{ route('farmer.product') }}" class="block rounded-lg bg-blue-400  dark:bg-neutral-700">
                        <div class="p-6">
                            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                Add Product
                            </h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>


    {{-- Weather WIDGET --}}

</x-app-layout>
