<?php
namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        return Pesan::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi_pesan' => 'required|string',
            'tanggal_pesan' => 'required|date',
            'pesan_dari' => 'required|string',
            'room_chat_id' => 'required|exists:room_chats,id',
        ]);

        $pesan = Pesan::create($validated);
        return response()->json($pesan, 201);
    }

    public function show(Pesan $pesan)
    {
        return $pesan;
    }

    public function update(Request $request, Pesan $pesan)
    {
        $validated = $request->validate([
            'isi_pesan' => 'required|string',
            'tanggal_pesan' => 'required|date',
            'pesan_dari' => 'required|string',
            'room_chat_id' => 'required|exists:room_chats,id',
        ]);

        $pesan->update($validated);
        return response()->json($pesan, 200);
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return response()->noContent();
    }
}
