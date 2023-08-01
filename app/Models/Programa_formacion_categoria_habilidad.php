<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa_formacion_categoria_habilidad extends Model
{
    use HasFactory;

    protected $table = 'programas_formacion_categorias';
    public $timestamps = false;

    public function ProgramaFormacion()
    {
        return $this->belongsTo(Programa_formacion::class,'programaformaciones_id'); 
    
    }

    public function categoriaHabilidades()
    {
        return $this->belongsTo(CategoriaHabilidad::class,'categoriahabilidades_id');
    }
   
}
