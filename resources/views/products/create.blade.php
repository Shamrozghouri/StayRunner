<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create A Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Minimum Price -->
                        <div class="mb-4">
                            <label for="min_price" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="min_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Minimum Price</label>
                            <input type="number" name="min_price" id="min_price" required class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Payment Options -->
                        <div>
                            <label for="payment_options" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Payment Options</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <input id="cash" name="payment_options" value="cash" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="cash" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Cash</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="online_banking" name="payment_options" value="online_banking" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="online_banking" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Online Banking</label>
                                </div>
                            </div>
                        </div>



                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                            <input type="text" name="city" id="city" required class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Product Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Description</label>
                            <textarea name="description" id="description" required class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Product Size -->
                        <div x-data="{ open: false, selected: 'Select size', size: '' }" class="relative">
                            <label for="size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Size</label>
                            <button @click="open = !open" @click.away="open = false" type="button"
                                    class="mt-1 block w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-left px-4 py-2">
                                <span x-text="selected"></span>
                            </button>

                            <!-- Dropdown options -->
                            <div x-show="open" class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-lg">
                                <ul class="py-1">
                                    <li @click="selected = 'Small'; size = 'small'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white">Small</li>
                                    <li @click="selected = 'Medium'; size = 'medium'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white">Medium</li>
                                    <li @click="selected = 'Large'; size = 'large'; open = false" class="p-4 cursor-pointer hover:bg-blue-500 hover:text-white">Large</li>
                                </ul>
                            </div>

                            <!-- Hidden input to submit selected value -->
                            <input type="hidden" name="size" x-model="size">
                        </div>



                        <!-- Product Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
