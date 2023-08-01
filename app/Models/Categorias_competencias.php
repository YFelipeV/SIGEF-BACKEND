<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias_competencias extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    public function categorias()
    {
        return $this->belongsTo(CategoriaHabilidad::class,'categoria_habilidad_id');
    }

    public function competencias()
    {
        return $this->belongsTo(Competencia::class,'competencia_id');
    }

    public function modalidades()
    {
        return $this->belongsTo(Modalidades::class,'modalidad_id');
    }
}
