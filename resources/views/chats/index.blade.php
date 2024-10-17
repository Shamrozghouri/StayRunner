<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md p-4 h-full overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4">Chats</h2>
            <ul class="divide-y divide-gray-200">
                @foreach($chats as $chat)
                    <li class="py-2 px-4 hover:bg-gray-100 transition duration-200">
                        <a href="#" class="text-gray-800">
                            {{ $chat->sender->name }} <span class="text-sm text-gray-500">({{ $chat->created_at->diffForHumans() }})</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Chat Container -->
        <div class="flex-1 flex flex-col p-4">
            <h2 class="text-2xl font-semibold mb-4">Chat with {{ $chats->first()->sender->name }}</h2>

            <!-- Message List (Scrollable Area) -->
            <div class="flex-1 overflow-y-auto">
                <div class="flex flex-col space-y-4">
                    @foreach($chats as $chat)
                        @if($chat->sender->id == auth()->id())
                            <!-- Sent message -->
                            <div class="self-end">
                                <div class="bg-blue-100 text-blue-800 rounded-lg p-3 mb-1 shadow-md">
                                    <p>{{ $chat->message }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $chat->created_at->diffForHumans() }}</span>
                            </div>
                        @else
                            <!-- Received message -->
                            <div class="self-start">
                                <div class="bg-gray-200 text-gray-800 rounded-lg p-3 mb-1 shadow-md">
                                    <p>{{ $chat->message }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $chat->created_at->diffForHumans() }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Reply Form (Fixed at the bottom) -->
            <div class="pt-4 border-t border-gray-300 bg-white">
                <div class="text-base px-3 m-auto w-full">
                    <div class="mx-auto flex flex-1 gap-4 text-base md:gap-5 lg:gap-6 md:max-w-3xl lg:max-w-[40rem] xl:max-w-[48rem]">
                        <form action="{{ route('chats.reply') }}" method="POST" class="w-full flex flex-col relative">
                            @csrf
                            <div class="relative flex items-center bg-[#f4f4f4] rounded-[26px] p-1.5">
                                <textarea
                                    name="message"
                                    rows="1"
                                    class="flex-1 p-2 w-full border-0 bg-transparent text-gray-700 rounded-lg placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 resize-none"
                                    placeholder="Type your reply..."
                                    required
                                    onkeydown="if(event.key === 'Enter') event.preventDefault()"
                                ></textarea>
                                <input type="hidden" name="receiver_id" value="{{ $chats->first()->sender->id }}">
                                <button
                                    type="submit"
                                    class="bg-black text-white p-2 ml-2 rounded-full hover:opacity-70 transition duration-200 flex items-center"
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('textarea[name="message"]').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                document.querySelector('button[type="submit"]').click();
            }
        });
    </script>
</x-app-layout>
