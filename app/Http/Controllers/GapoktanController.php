<?php

namespace App\Http\Controllers;

use App\Gapoktan;
use Illuminate\Http\Request;

class GapoktanController extends Controller
{
    public function index()
    {
        $gapoktan = Gapoktan::with('poktan')->get();

        return view('ketua.gapoktan.index', compact('gapoktan'));

    }

    public function create()
    {
        return view('ketua.gapoktan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ]);

        Gapoktan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('ketua.gapoktan.index')->with(['success' => 'Data berhasil diperbarui.']);
    }

    public function show(Gapoktan $gapoktan)
{
    $gapoktan = Gapoktan::with('poktan')->findOrFail($gapoktan->id);

    return view('ketua.gapoktan.show', compact('gapoktan'));
}

    public function storePoktan(Request $request, Gapoktan $gapoktan)
{
    $request->validate([
        'nama' => 'required',
    ]);

    $poktan = new Poktan;
    $poktan->nama = $request->nama;
    $poktan->gapoktan_id = $gapoktan->id;
    $poktan->save();

    return redirect()->route('ketua.gapoktan.show', ['gapoktan' => $gapoktan])->with(['success' => 'Poktan berhasil ditambahkan.']);
}


    public function edit(Gapoktan $gapoktan)
    {
        return view('ketua.gapoktan.edit', compact('gapoktan'));
    }

    public function update(Request $request, Gapoktan $gapoktan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ]);

        Gapoktan::where('id', $gapoktan->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('ketua.gapoktan.index')->with(['success' => 'Gapoktan berhasil diupdate.']);
    }

    public function destroy(Gapoktan $gapoktan)
    {
        $gapoktan = Gapoktan::findOrFail($gapoktan->id);
        $gapoktan->delete();
        return redirect()->route('ketua.gapoktan.index')->with(['success' => 'Data Gapoktan ID ' . $gapoktan->id . ' Berhasil Dihapus']);
    }
}
