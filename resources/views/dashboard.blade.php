<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- Buyer role -->
                    @if (Auth::user()->role === 'buyer')
                    <div class="space-y-8">
                        <!-- Products Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Products
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $product->name }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $product->min_price }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Bids Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Bids
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($bids as $bid)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $bid->what_you_need }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $bid->price }}</span>

                                        </div>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $bid->description }}</p>
                                                <a href="{{ route('bids.edit', $bid->id) }}" class="text-blue-500 ml-2">Edit</a>
                                            </div>
                                            <div class="flex items-center">
                                                <form action="{{ route('bids.destroy', $bid->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500">Delete</button>
                                                </form>

                                            </div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400 ml-4">{{ Auth::user()->name }}</span>
                                        </div>


                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Seller role -->
                    @elseif (Auth::user()->role === 'seller')
                    <div class="space-y-8">
                        <!-- Products Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Products
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $product->name }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $product->min_price }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </li>

                                @endforeach
                            </ul>
                        </div>

                        <!-- Bids Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Bids
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($bids as $bid)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $bid->what_you_need }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $bid->price }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $bid->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Runner role -->
                    @elseif (Auth::user()->role === 'runner')
                    <!-- Products and Bids for Runner (Read-Only) -->
                    <div class="space-y-8">
                        <!-- Products Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Products
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $product->name }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $product->min_price }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Bids Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-300 pb-2">
                                Bids
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($bids as $bid)
                                    <li class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $bid->what_you_need }}</h4>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">${{ $bid->price }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $bid->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding products -->
    <div id="productModal" class="fixed inset-0 items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 transition transform duration-300 scale-95 opacity-0" id="modalContent">
            <h2 class="text-xl font-semibold mb-4">List Your Product</h2>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal form content -->
                <div class="mb-4">
                    <label for="min_price" class="block text-sm font-medium text-gray-700">Minimum Price</label>
                    <input type="number" name="min_price" id="min_price" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="mr-2 text-gray-500" onclick="toggleModal()">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function toggleModal() {
        const modal = document.getElementById('productModal');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>
