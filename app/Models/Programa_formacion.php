<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa_formacion extends Model
{
    use HasFactory;
    protected $table = 'programas_formaciones';


    public function categoria_habilidades()
    {
        return $this->belongsToMany(CategoriaHabilidad::class,'programa_formacion_categoria_habilidades');
    }
}
