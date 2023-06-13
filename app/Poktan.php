<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poktan extends Model
{
    protected $table = 'poktan';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'gapoktan_id'];

    public function gapoktan()
    {
        return $this->belongsTo(Gapoktan::class, 'gapoktan_id');
    }

    public function anggota_poktan()
    {
        return $this->hasMany(AnggotaPoktan::class, 'poktan_id');
    }

}
