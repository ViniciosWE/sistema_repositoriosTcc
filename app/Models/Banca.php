<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    protected $fillable = [
        'nome',
        'titulacao'
    ];


    public function tccsComoBanca1()
    {
        return $this->hasMany(Tcc::class, 'banca1_id');
    }


    public function tccsComoBanca2()
    {
        return $this->hasMany(Tcc::class, 'banca2_id');
    }
}

