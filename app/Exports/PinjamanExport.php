<?php

namespace App\Exports;

use App\Models\Pinjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PinjamanExport implements FromCollection, WithHeadings
{
    protected $pinjaman;

    public function __construct($pinjaman)
    {
        $this->pinjaman = $pinjaman;
    }

    public function collection()
    {
        return $this->pinjaman;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Anggota',
            'Poktan',
            'Gapoktan',
            'Tanggal Pinjam',
            'Jumlah Pinjaman',
            'Biaya Jasa',
            'Status',
        ];
    }
}
