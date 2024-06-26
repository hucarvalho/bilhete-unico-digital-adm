<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuda extends Model
{
    use HasFactory;
    protected $fillable = [
        'tituloAjuda',
        'caminhoAjuda',
        'descAjuda',
        'statusAjuda',
        'categoriaAjuda_id'
    ];
    public function categoriaAjuda()
    {
        return $this->belongsTo(CategoriaAjuda::class);
    }

    public function votosAjuda()
    {
        return $this->hasMany(VotosAjuda::class);
    }

    public function passageiros()
    {
        return $this->belongsToMany(Passageiro::class);
    }
}
