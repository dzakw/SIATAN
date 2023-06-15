<?php

namespace App\Http\Controllers;

use App\Poktan;
use App\Gapoktan;
use Illuminate\Http\Request;

class PoktanController extends Controller
{
    public function index($gapoktan)
    {
        $gapoktan = Gapoktan::findOrFail($gapoktan);
        $poktan = $gapoktan->poktan;

        return view('ketua.gapoktan.show', compact('poktan', 'gapoktan', 'gapoktan'));
    }



    public function create($gapoktan)
    {
        $gapoktan = Gapoktan::findOrFail($gapoktan);
        $poktan = $gapoktan->poktan;

        return view('ketua.poktan.create', compact('poktan', 'gapoktan'));
    }




    public function show($gapoktan, $poktan)
    {
        $poktan = Poktan::findOrFail($poktan);
        $gapoktan = $poktan->gapoktan;

        return view('ketua.poktan.show', compact('poktan', 'gapoktan', 'gapoktan', 'poktan'));
    }




    public function store(Request $request, $gapoktan)
    {
        $request->validate([
            'nama' => 'required',
            'gapoktan_id' => 'required|exists:gapoktan,id',
        ]);

        Poktan::create([
            'nama' => $request->nama,
            'gapoktan_id' => $gapoktan,
        ]);

        return redirect()->route('ketua.gapoktan.show', ['gapoktan' => $gapoktan])->with(['success' => 'Poktan berhasil ditambahkan.']);
    }


    public function edit($gapoktan_id, $poktan_id)
    {
        $gapoktan = Gapoktan::findOrFail($gapoktan_id);
        $poktan = Poktan::findOrFail($poktan_id);
        return view('ketua.poktan.edit', compact('gapoktan', 'poktan'));
    }



    public function update(Request $request, $poktan_id)
    {
        $request->validate([
            'nama' => 'required',
            'gapoktan_id' => 'required|exists:gapoktan,id',
        ]);

        $poktan = Poktan::findOrFail($poktan_id);

        $poktan->nama = $request->nama;
        $poktan->gapoktan_id = $request->gapoktan_id;
        $poktan->save();

        return redirect()->route('ketua.gapoktan.show', ['gapoktan' => $request->gapoktan_id])->with(['success' => 'Poktan berhasil diupdate.']);
    }

    public function destroy(Gapoktan $gapoktan, Poktan $poktan)
    {
        $poktan->delete();
        return redirect()->route('ketua.gapoktan.show', ['gapoktan' => $gapoktan])->with(['success' => 'Data Poktan ID ' . $poktan->id . ' Berhasil Dihapus']);
    }

}
