<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update a Bid') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Update Your Bid</h1>

        <form action="{{ route('bids.update', $bid) }}" method="POST" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- What You Need -->
            <div>
                <label for="what_you_need" class="block text-sm font-medium text-gray-700 mb-1">What You Need</label>
                <input
                    type="text"
                    name="what_you_need"
                    id="what_you_need"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->what_you_need }}"
                    required
                    oninput="filterProducts()"
                >
            </div>

            <!-- Product Selection -->
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Select Product</label>
                <select
                    id="product_id"
                    name="product_id"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    onchange="updateInput()"
                >
                    <option value="">Select a product...</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                                data-price="{{ $product->min_price }}"
                                {{ $bid->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                    <option value="new">Add new product</option>
                </select>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->email }}"
                    required>
            </div>

            <!-- City -->
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                <input
                    type="text"
                    name="city"
                    id="city"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->city }}"
                    required>
            </div>

            <!-- Delivery Address -->
            <div>
                <label for="delivery_address" class="block text-sm font-medium text-gray-700 mb-1">Delivery Address</label>
                <input
                    type="text"
                    name="delivery_address"
                    id="delivery_address"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->delivery_address }}"
                    required>
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->name }}"
                    required>
            </div>

            <!-- Special Instructions -->
            <div>
                <label for="special_instructions" class="block text-sm font-medium text-gray-700 mb-1">Special Instructions</label>
                <textarea
                    name="special_instructions"
                    id="special_instructions"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $bid->special_instructions }}</textarea>
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $bid->price }}"
                    required>
            </div>

            <!-- Payment Type -->
            <div>
                <label for="payment_type" class="block text-sm font-medium text-gray-700 mb-1">Payment Type</label>
                <select
                    name="payment_type"
                    id="payment_type"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="Cash" {{ $bid->payment_type == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Online Banking" {{ $bid->payment_type == 'Online Banking' ? 'selected' : '' }}>Online Banking</option>
                </select>
            </div>

            <!-- Update Button -->
            <div class="flex justify-center">
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update Bid
                </button>
            </div>
        </form>
    </div>

    <script>
        function filterProducts() {
            const input = document.getElementById("what_you_need");
            const select = document.getElementById("product_id");
            const priceInput = document.getElementById("price");

            const inputValue = input.value.trim().toLowerCase();
            let foundMatch = false;

            for (let i = 0; i < select.options.length; i++) {
                const option = select.options[i];
                const optionText = option.text.toLowerCase(); // Convert option text to lowercase

                // Match regardless of case
                if (optionText === inputValue) {
                    select.value = option.value;
                    priceInput.value = option.getAttribute("data-price");
                    foundMatch = true;
                    break;
                }
            }

            // Clear selection if no match is found
            if (!foundMatch) {
                select.value = "";
                priceInput.value = "";
                select.removeAttribute('required');
            }
        }

        function updateInput() {
            const select = document.getElementById("product_id");
            const input = document.getElementById("what_you_need");
            const priceInput = document.getElementById("price");

            if (select.value === "new") {
                input.value = "";
                input.focus();
                priceInput.value = "";
                select.value = "";
                select.removeAttribute('required');
            } else {
                const selectedOption = select.options[select.selectedIndex];
                input.value = selectedOption.text;
                priceInput.value = selectedOption.getAttribute("data-price");
                select.setAttribute('required', 'required');
            }

            // Clear product selector if "What You Need" input is empty
            if (input.value.trim() === "") {
                select.value = "";
                priceInput.value = "";
                select.removeAttribute('required');
            }
        }

        // Initialize input and select based on existing values
        document.addEventListener("DOMContentLoaded", () => {
            updateInput(); // Initialize on load if there's a pre-selected product
        });
    </script>


</x-app-layout>
