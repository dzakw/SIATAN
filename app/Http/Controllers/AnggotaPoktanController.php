<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Poktan;
use App\AnggotaPoktan;
use Illuminate\Http\Request;

class AnggotaPoktanController extends Controller
{

    public function index($gapoktan_id, $poktan_id)
    {
        $poktan = Poktan::findOrFail($poktan_id);
        $anggota = $poktan->anggota_poktan;

        return view('ketua.anggota.index', compact('poktan', 'anggota'));
    }

    public function create($gapoktan_id, $poktan_id)
    {
        $poktan = Poktan::findOrFail($poktan_id);
        $gapoktan = $poktan->gapoktan; // add this line to get the gapoktan object
        $nama_anggota = '';
        return view('ketua.anggota.create', compact('poktan', 'gapoktan', 'nama_anggota')); // pass the gapoktan variable to the view
    }


    public function store(Request $request, $gapoktan_id, $poktan_id)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'kontak' => 'required|max:12'
        ]);

        $poktan = Poktan::findOrFail($poktan_id);

        $anggota = new AnggotaPoktan;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->kontak = $request->kontak;

        $poktan->anggota_poktan()->save($anggota);

        return redirect()->route('ketua.poktan.show', ['gapoktan' => $gapoktan_id, 'poktan' => $poktan_id])->with(['status' => 'Data Anggota Berhasil Ditambahkan']);
    }

    public function show($gapoktan_id, $poktan_id, $anggota_id)
    {
        $poktan = Poktan::findOrFail($poktan_id);
        $gapoktan = $poktan->gapoktan;
        $nama_anggota = '';
        $anggota_poktan = AnggotaPoktan::findOrFail($anggota_id);

        return view('ketua.anggota.show', compact('poktan','gapoktan', 'anggota_poktan'));
    }


    public function edit($gapoktan_id, $poktan_id, $anggota_id)
    {
        $poktan = Poktan::findOrFail($poktan_id);
        $gapoktan = $poktan->gapoktan;
        $nama_anggota = '';

        $anggota_poktan = AnggotaPoktan::findOrFail($anggota_id);

        return view('ketua.anggota.edit', compact('anggota_poktan', 'poktan', 'gapoktan', 'nama_anggota'));
    }

    public function update(Request $request, $gapoktan_id, $poktan_id, $anggota_id)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'kontak' => 'required'
        ]);

        $anggota = AnggotaPoktan::findOrFail($anggota_id);
        $data = $request->all();

        $anggota->update($data);

        return redirect()->route('ketua.poktan.show', ['gapoktan' => $gapoktan_id, 'poktan' => $poktan_id])->with(['status' => 'Data Berhasil Diubah']);
    }

    public function destroy($gapoktan_id, $poktan_id, $anggota_id)
    {
        $anggota_poktan = AnggotaPoktan::findOrFail($anggota_id);
        $anggota_poktan->delete();

        return redirect()->route('ketua.poktan.show', ['gapoktan' => $gapoktan_id, 'poktan' => $poktan_id])
            ->with(['status' => 'Data unit Berhasil Dihapus']);
    }
}

