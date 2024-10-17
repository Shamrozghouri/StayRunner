<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Products') }}
        </h2>
    </x-slot>

    <div class="mt-6 flex justify-end md:me-10 items-end">
        @if (Auth::user()->role === 'seller')
            <div class="flex justify-end mb-6">
                <a href="{{ route('products.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-700 transition">Create A New Product</a>
            </div>
        @endif
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                            @if($product->image)
                                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}">
                            @else
                                <img class="w-full h-48 object-cover" src="/default-image.jpg" alt="No image available">
                            @endif
                            <div class="p-6">
                                <h3 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">{{ $product->name }}</h3>
                                <h3 class="font-bold text-md mb-2 text-gray-800 dark:text-gray-200">{{ $product->city }}</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $product->description }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-indigo-600 font-semibold">Price: ${{ $product->min_price }}</span>
                                    <span class="bg-gray-200 dark:bg-gray-600 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 dark:text-gray-300">{{ ucfirst($product->size) }}</span>
                                    <br/>

                                </div>
                                <br />
                                @if(auth()->user()->role === 'runner')
                                        @if($product->user)
                                        <a href="{{ route('chats.create', ['receiver_id' => $product->user->id]) }}"
                                            class="inline-flex items-center px-4 py-2  bg-green-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-dark-600 focus:ring-offset-2 transition duration-200 ease-in-out"
                                            aria-label="Chat with Seller Creator">
                                             <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5V6a2 2 0 00-2-2h-6.5m0 0a2 2 0 00-2 2m2-2v5.5m-8 4.5h7.5a2 2 0 002-2v-6a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                             </svg>
                                             Chat with Seller Creator
                                         </a>

                                        @else
                                            <p>No user associated with this seller.</p>
                                        @endif
                                    @endif
                            </div>

                            <div class="p-4 flex justify-between">
                                @if (Auth::user()->role === 'seller')
                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center">
                            <p class="text-gray-600 dark:text-gray-300">No products found.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-6 flex justify-between items-center">
                    @if (Auth::user()->role === 'seller')
                        <a href="{{ route('products.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add Product</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
