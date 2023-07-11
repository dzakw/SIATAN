<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AnggotaPoktan;
use App\Pinjaman;
use App\Gapoktan;
use App\Poktan;
use App\Invoice;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PinjamanExport;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class PinjamanController extends Controller
{

    public function index()
    {
        $pinjaman = Pinjaman::leftJoin('anggota_poktan', 'pinjaman.anggota_poktan_id', '=', 'anggota_poktan.id')
            ->select('pinjaman.*', 'anggota_poktan.nama_anggota')
            ->get();

        return view('ketua.pinjaman.index', compact('pinjaman'));
    }

    public function create($poktan, $anggota)
    {
        $poktan = Poktan::findOrFail($poktan);
        $gapoktan = $poktan->gapoktan;
        $anggota_poktan = AnggotaPoktan::where('poktan_id', $poktan->id)
            ->where('id', $anggota)
            ->firstOrFail();

        return view('ketua.pinjaman.create', compact('gapoktan', 'poktan', 'anggota_poktan'));
    }


    public function store(Request $request, $gapoktan, $poktan, $anggota)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required|string|max:100',
            'biaya_jasa' => 'required',
            'tanggal_pinjaman' => 'required|date_format:Y-m-d',
            'status' => 'required|in:pending,belum_lunas,lunas'
        ]);

        $anggota_poktan = AnggotaPoktan::where('poktan_id', $poktan)
            ->where('id', $anggota)
            ->firstOrFail();

        $pinjaman = new Pinjaman;
        $pinjaman->anggota_poktan_id = $anggota_poktan->id;
        $pinjaman->jumlah_pinjaman = $request->jumlah_pinjaman;
        $pinjaman->biaya_jasa = $request->biaya_jasa;
        $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
        $pinjaman->status = $request->status;

        $pinjaman->save();

        return redirect()->route('ketua.anggota.show', ['gapoktan' => $gapoktan, 'poktan' => $poktan, 'anggota' => $anggota])->with(['status' => 'Data Pinjaman Berhasil Ditambahkan']);
    }



    public function show($anggota_id, $pinjaman_id)
    {
        $anggota = AnggotaPoktan::findOrFail($anggota_id);
        $pinjaman = Pinjaman::findOrFail($pinjaman_id);

        return view('ketua.pinjaman.show', compact('anggota','pinjaman'));
    }


    public function edit($anggota_id, $pinjaman_id)
    {
        $anggota = AnggotaPoktan::findOrFail($anggota_id);
        $pinjaman = Pinjaman::findOrFail($pinjaman_id);

        return view('ketua.pinjaman.edit', compact('anggota', 'pinjaman'));
    }

    public function update(Request $request, $anggota_id, $pinjaman_id)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required|string|max:100',
            'biaya_jasa' => 'required',
            'tanggal_pinjaman' => 'required|date_format:Y-m-d',
            'status' => 'required|in:pending,belum_lunas,lunas'
        ]);

        $pinjaman = Pinjaman::findOrFail($pinjaman_id);
        $data = $request->all();

        $pinjaman->update($data);

        return redirect()->route('ketua.anggota.show', ['gapoktan' => $anggota_id->poktan->gapoktan->id, 'poktan' => $anggota->poktan->id, 'anggota' => $anggota->id])->with(['status' => 'Data Pinjaman Berhasil Diubah']);
    }

    public function destroy($anggota_id, $pinjaman_id)
    {
        $pinjaman = Pinjaman::findOrFail($pinjaman_id);
        $pinjaman->delete();

        return redirect()->route('ketua.anggota.show', ['gapoktan' => $anggota_id->poktan->gapoktan->id, 'poktan' => $anggota->poktan->id, 'anggota' => $anggota->id])->with(['status' => 'Data Pinjaman Berhasil Dihapus']);
    }

    public function bayar($gapoktan_id, $poktan_id, $anggota_id)
    {
        $anggota_poktan = AnggotaPoktan::findOrFail($anggota_id);
        $pinjaman = $anggota_poktan->pinjaman()->where('status', 'belum_lunas')->firstOrFail();

        $pinjaman->status = 'lunas';
        $pinjaman->save();

        return redirect()->back()->with(['status' => 'Pembayaran Berhasil']);
    }

    public function cetak_pdf()
    {
        $pinjaman = Pinjaman::with('anggota_poktan')->get();

        $pdf = PDF::loadView('ketua.pinjaman.pdf', compact('pinjaman'));
        return $pdf->download('laporan-pinjaman.pdf');
    }

    public function cetak_excel()
    {
        $pinjaman = Pinjaman::with('anggota_poktan')->get();

        return Excel::download(new PinjamanExport($pinjaman), 'laporan-pinjaman.xlsx');
    }

    public function cetak_word()
    {
        $pinjaman = Pinjaman::with('anggota_poktan')->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(500)->addText('No');
        $table->addCell(2000)->addText('Nama Anggota');
        $table->addCell(2000)->addText('Poktan');
        $table->addCell(2000)->addText('Gapoktan');
        $table->addCell(2000)->addText('Tanggal Pinjam');
        $table->addCell(2000)->addText('Jumlah Pinjaman');
        $table->addCell(2000)->addText('Biaya Jasa');
        $table->addCell(1000)->addText('Status');

        foreach ($pinjaman as $item) {
            $table->addRow();
            $table->addCell(500)->addText($item->id);
            $table->addCell(2000)->addText($item->anggota_poktan->nama_anggota);
            $table->addCell(2000)->addText($item->anggota_poktan->poktan->nama);
            $table->addCell(2000)->addText($item->anggota_poktan->poktan->gapoktan->nama);
            $table->addCell(2000)->addText($item->tanggal_pinjaman);
            $table->addCell(2000)->addText($item->jumlah_pinjaman);
            $table->addCell(2000)->addText($item->biaya_jasa);
            $table->addCell(1000)->addText($item->status);
        }

        $filename = 'laporan-pinjaman.docx';
        $phpWord->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

}

