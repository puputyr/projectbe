<?php
namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return History::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string',
            'nama_perilaku' => 'required|string',
            'level_peringatan' => 'required|in:merah,kuning,hijau',
            'bukti' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $history = History::create($validated);
        return response()->json($history, 201);
    }

    public function show(History $history)
    {
        return $history;
    }

    public function update(Request $request, History $history)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string',
            'nama_perilaku' => 'required|string',
            'level_peringatan' => 'required|in:merah,kuning,hijau',
            'bukti' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $history->update($validated);
        return response()->json($history, 200);
    }

    public function destroy(History $history)
    {
        $history->delete();
        return response()->noContent();
    }
}

