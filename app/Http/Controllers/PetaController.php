<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        return Peta::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi_cctv' => 'required|string',
            'koordinat' => 'required|string',
        ]);

        $peta = Peta::create($validated);
        return response()->json($peta, 201);
    }

    public function show(Peta $peta)
    {
        return $peta;
    }

    public function update(Request $request, Peta $peta)
    {
        $validated = $request->validate([
            'lokasi_cctv' => 'required|string',
            'koordinat' => 'required|string',
        ]);

        $peta->update($validated);
        return response()->json($peta, 200);
    }

    public function destroy(Peta $peta)
    {
        $peta->delete();
        return response()->noContent();
    }
}

