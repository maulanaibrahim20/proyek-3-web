<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    // Mengambil semua pesan
    public function index()
    {
        $messages = Message::all();
        return MessageResource::collection($messages);
    }

    // Mengambil detail pesan
    public function show($id)
    {
        $message = Message::find($id);
        return response()->json($message);
    }

    // Menyimpan pesan baru
    public function store(Request $request)
    {
        $message = new Message;
        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->message = $request->input('message');
        $message->save();

        return response()->json($message);
    }

    // Mengupdate pesan
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->message = $request->input('message');
        $message->save();

        return response()->json($message);
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        return response()->json(['message' => 'Message deleted']);
    }
}
