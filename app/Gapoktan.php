<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gapoktan extends Model
{
    protected $table = 'gapoktan';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'alamat', 'kontak'];

    public function poktan()
    {
        return $this->hasMany(Poktan::class, 'gapoktan_id');
    }
}
