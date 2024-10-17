<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Ensure this is imported

class ChatController extends Controller
{
    public function index()
    {
        // Debugging

        $userId = Auth::id(); // Use Auth::id() to get the authenticated user's ID
        Log::info("Current User ID: {$userId}"); // Change $user_id to $userId

        $chats = Chat::where('sender_id', $userId)
                     ->orWhere('receiver_id', $userId)
                     ->with(['sender', 'receiver'])
                     ->get();

        Log::info("Chats for User ID {$userId}: ", $chats->toArray());

        return view('chats.index', compact('chats'));
    }

    // Fix: Inject the Request object to access request data
    public function create(Request $request)
    {
        $receiver = User::find($request->receiver_id); // Find the receiver (seller or user)
        return view('chats.create', compact('receiver'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('chats.index')->with('success', 'Message sent successfully!');
    }

    public function reply(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:500',
        ]);

        // Create a new chat entry
        Chat::create([
            'sender_id' => Auth::id(), // The ID of the current user
            'receiver_id' => $request->input('receiver_id'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Reply sent successfully!');
    }
}
