<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';
    protected $primaryKey = 'id';

    protected $fillable = ['anggota_poktan_id', 'jumlah_pinjaman', 'biaya_jasa', 'tanggal_pinjaman', 'status'];

    use SoftDeletes;

    public function anggota_poktan()
    {
        return $this->belongsTo(AnggotaPoktan::class, 'anggota_poktan_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'pinjaman_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'pinjaman_id');
    }
}
