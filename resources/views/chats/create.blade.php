<x-app-layout>
    <div class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Send a Message to {{ $receiver->name }}</h2>

        <form action="{{ route('chats.store') }}" method="POST">
            @csrf

            <!-- Pre-fill the receiver ID -->
            <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                <textarea name="message" id="message" rows="4" required
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 resize-none"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 ease-in-out">
                Send
            </button>
        </form>
    </div>
</x-app-layout>
