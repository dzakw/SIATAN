<?php

namespace App\Http\Controllers;

use App\Poktan;
use Illuminate\Http\Request;

class PoktanController extends Controller
{
    public function index()
    {
        $poktan = Poktan::with('anggota_poktan')->get();

        return view('ketua.poktan.index', compact('poktan'));
    }

    public function create($gapoktan_id)
    {
        $gapoktan = Gapoktan::findOrFail($gapoktan_id);
        return view('ketua.poktan.create', compact('gapoktan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gapoktan_id' => 'required|exists:gapoktan,id',
        ]);

        Poktan::create([
            'nama' => $request->nama,
            'gapoktan_id' => $request->gapoktan_id,
        ]);

        return redirect()->route('ketua.poktan.index')->with(['success' => 'Poktan berhasil ditambahkan.']);
    }

    public function edit(Poktan $poktan)
    {
        return view('ketua.poktan.edit', compact('poktan'));
    }

    public function update(Request $request, Poktan $poktan)
    {
        $request->validate([
            'nama' => 'required',
            'gapoktan_id' => 'required|exists:gapoktan,id',
        ]);

        Poktan::where('id', $poktan->id)->update([
            'nama' => $request->nama,
            'gapoktan_id' => $request->gapoktan_id,
        ]);

        return redirect()->route('ketua.poktan.index')->with(['success' => 'Poktan berhasil diupdate.']);
    }

    public function destroy(Poktan $poktan)
    {
        $poktan = Poktan::findOrFail($poktan->id);
        $poktan->delete();
        return redirect()->route('ketua.poktan.index')->with(['success' => 'Data Poktan ID ' . $poktan->id . ' Berhasil Dihapus']);
    }
}
