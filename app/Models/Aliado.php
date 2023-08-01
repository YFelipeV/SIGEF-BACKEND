<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aliado extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    public function categoriashabilidades(){

        return $this->belongsToMany(CategoriaHabilidad::class,'aliado_categoria_habilidades');
    }
}
