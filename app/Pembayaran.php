<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    protected $table = 'bayar_pinjaman';
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $fillable = ['pinjaman_id', 'jatuh_tempo', 'tanggal_bayar', 'nominal', 'denda', 'keterangan'];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class, 'pinjaman_id');
    }
}
