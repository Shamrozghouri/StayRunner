<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Bids') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <div class="mt-6 flex justify-end items-end">
            @if (Auth::user()->role === 'buyer')
                <div class="flex justify-end mb-6">
                    <a href="{{ route('bids.create') }}" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-800 transition-colors duration-300">
                        Create a New Bid
                    </a>
                </div>
            @endif
        </div>

        @if($bids->isEmpty())
            <p class="text-center text-gray-700">You have not created any bids yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($bids as $bid)
                    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white hover:shadow-2xl transform hover:scale-105 transition-transform duration-300">

                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $bid->what_you_need }}</h3>
                            <p class="text-gray-600 mb-1"><strong>Price:</strong> ${{ $bid->price }}</p>
                            <p class="text-gray-600 mb-1"><strong>City:</strong> {{ $bid->city }}</p>
                            <p class="text-gray-600 mb-4"><strong>Payment Type:</strong> {{ $bid->payment_type }}</p>
                            @if(auth()->user()->role === 'runner')
                            @if($bid->user)
                                <a href="{{ route('chats.create', ['receiver_id' => $bid->user->id]) }}"
                                   class="inline-flex items-center px-4 py-2  bg-green-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-dark-600 focus:ring-offset-2 transition duration-200 ease-in-out"
                                   aria-label="Chat with Bid Creator">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5V6a2 2 0 00-2-2h-6.5m0 0a2 2 0 00-2 2m2-2v5.5m-8 4.5h7.5a2 2 0 002-2v-6a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                    </svg>
                                    Chat with Bid Creator
                                </a>
                            @else
                                <p class="text-red-500">No user associated with this bid.</p>
                            @endif
                        @endif

                            <div class="flex justify-between">
                                @if (Auth::user()->role === 'buyer')
                                    <a href="{{ route('bids.edit', $bid) }}" class="text-indigo-600 font-semibold hover:text-indigo-800 transition-colors duration-300">Edit</a>

                                    <form action="{{ route('bids.destroy', $bid) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 font-semibold hover:text-red-800 transition-colors duration-300"
                                                onclick="return confirm('Are you sure you want to delete this bid?')">Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
