<?php

namespace App\Http\Controllers;
use App\Models\RoomChat;
use Illuminate\Http\Request;

class RoomChatController extends Controller
{
    public function index()
    {
        return RoomChat::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:menunggu,dilayani,selesai',
        ]);

        $roomChat = RoomChat::create($validated);
        return response()->json($roomChat, 201);
    }

    public function show(RoomChat $roomChat)
    {
        return $roomChat;
    }

    public function update(Request $request, RoomChat $roomChat)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:menunggu,dilayani,selesai',
        ]);

        $roomChat->update($validated);
        return response()->json($roomChat, 200);
    }

    public function destroy(RoomChat $roomChat)
    {
        $roomChat->delete();
        return response()->noContent();
    }
}
