<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{

    protected $casts = [
        'data' => 'date',
    ];
    protected $fillable = [
        'titulo',
        'aluno',
        'orientador',
        'banca1_id',
        'banca2_id',
        'paginas',
        'data',
        'hora',
        'resumo',
        'palavras_chave',
        'arquivo_pdf'
    ];




    public function banca1()
    {
        return $this->belongsTo(Banca::class, 'banca1_id');
    }




    public function banca2()
    {
        return $this->belongsTo(Banca::class, 'banca2_id');
    }
}

