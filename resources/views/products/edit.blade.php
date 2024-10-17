<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">Edit Product</h1>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="mb-4">
                            <label for="min_price" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('min_price', $product->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="min_price" class="block text-sm font-medium text-gray-700">Minimum Price</label>
                            <input type="number" name="min_price" id="min_price" value="{{ old('min_price', $product->min_price) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        @php
                        $paymentOptions = json_decode($product->payment_options, true);
                    @endphp

                    <div class="mb-4">
                        <label for="payment_options" class="block text-sm font-medium text-gray-700">Payment Options</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input id="cash" name="payment_options[]" value="cash" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ is_array($paymentOptions) && in_array('cash', $paymentOptions) ? 'checked' : '' }}>
                                <label for="cash" class="ml-2 block text-sm text-gray-700">Cash</label>
                            </div>
                            <div class="flex items-center">
                                <input id="online_banking" name="payment_options[]" value="online_banking" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ is_array($paymentOptions) && in_array('online_banking', $paymentOptions) ? 'checked' : '' }}>
                                <label for="online_banking" class="ml-2 block text-sm text-gray-700">Online Banking</label>
                            </div>
                        </div>
                    </div>


                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ old('city', $product->city) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Products Description</label>
                            <textarea name="description" id="description" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div x-data="{ open: false, selected: '{{ $product->size ? ucfirst($product->size) : 'Select size' }}', size: '{{ $product->size }}' }" class="mb-4 relative">
                            <label for="size" class="block text-sm font-medium text-gray-700">Product Size</label>
                            <button @click="open = !open" @click.away="open = false" type="button"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-left px-4 py-2">
                                <span x-text="selected"></span>
                            </button>

                            <!-- Dropdown options -->
                            <div x-show="open" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg">
                                <ul class="py-1">
                                    <li @click="selected = 'Small'; size = 'small'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white {{ $product->size == 'small' ? 'bg-blue-500 text-white' : '' }}">Small</li>
                                    <li @click="selected = 'Medium'; size = 'medium'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white {{ $product->size == 'medium' ? 'bg-blue-500 text-white' : '' }}">Medium</li>
                                    <li @click="selected = 'Large'; size = 'large'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white {{ $product->size == 'large' ? 'bg-blue-500 text-white' : '' }}">Large</li>
                                </ul>
                            </div>

                            <!-- Hidden input to submit selected value -->
                            <input type="hidden" name="size" x-model="size" required>
                        </div>


                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Product Image (Leave blank to keep current)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @if($product->image)
                                <img class="w-auto h-40 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->description }}">
                            @else
                                <img class="w-auto h-40 object-cover" src="/default-image.jpg" alt="No image available">
                            @endif
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
