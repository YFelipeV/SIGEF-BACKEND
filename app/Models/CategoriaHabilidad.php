<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaHabilidad extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    protected $table = 'categoria_habilidad';

    public function aliados()
    {
        return $this->belongsToMany(Aliado::class, 'aliado_categoria_habilidades');
    }

    public function programas_formaciones()
    {
        return $this->belongsToMany(Programa_formacion::class, 'programa_formacion_categoria_habilidades');
    }
}
