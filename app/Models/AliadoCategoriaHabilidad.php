<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AliadoCategoriaHabilidad extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    protected $table = 'aliado_categoria_habilidades';
    public function Aliado()
    {
        return $this->belongsTo(Aliado::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaHabilidad::class);
    }
}
