<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\AnggotaPoktan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AnggotaPoktanController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $query = AnggotaPoktan::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('anggota_poktan.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('anggota_poktan.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>'; // added closing tag for div
                })->make(true); // added make function to generate JSON response
        }

        return view('admin.member.anggota_poktan_index');
    }

    public function create()
    {
        return view('admin.member.anggota_poktan_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'kontak' => 'required|max:12'
        ]);

        // Anggota::create($data);

        $anggota_poktan = new AnggotaPoktan;
        $anggota_poktan->nama_anggota = $request->nama_anggota;
        $anggota_poktan->jenis_kelamin = $request->jenis_kelamin;
        $anggota_poktan->kontak = $request->telepon;
        $anggota_poktan->save();
        return redirect()->route('anggota_poktan.create')->with(['status' => 'Data Anggota Berhasil Ditambahkan']);
    }

    public function show(AnggotaPoktan $anggota_poktan)
    {

    }

    public function edit($anggotum)
    {
        $anggota_poktan = AnggotaPoktan::find($anggotum); // modified Find to find
        return view('admin.member.anggota_poktan_show', compact('anggota_poktan'));
    }

    public function update(Request $request, $anggotum)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'kontak' => 'required'
        ]);

        $anggota_poktan = AnggotaPoktan::findOrFail($anggotum);
        $data = $request->all();

        $anggota_poktan->update($data);
        return redirect()->route('anggota_poktan.index')->with(['status' => 'Data Berhasil Diubah']);
    }

    public function destroy($anggotum)
    {
        $anggota_poktan = AnggotaPoktan::findOrFail($anggotum);
        $anggota_poktan->forceDelete();
        return redirect()->route('anggota_poktan.index')
            ->with(['status' => 'Data unit Berhasil Dihapus']);
    }
}
