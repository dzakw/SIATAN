<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaPoktan extends Model
{
    protected $table = 'anggota_poktan';
    protected $primaryKey = 'id';

    protected $fillable = ['nama_anggota', 'jenis_kelamin', 'kontak', 'poktan_id'];
    use SoftDeletes;


    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'anggota_poktan_id', 'id');
    }

    public function poktan()
    {
        return $this->belongsTo(Poktan::class, 'poktan_id', 'id');
    }

}
