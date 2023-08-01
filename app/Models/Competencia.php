<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    protected $table = 'competencia';
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    public function centrosFormacion()
    {

        return $this->belongsTo(CentroFormacion::class, 'centro_formacion_id');
    }
}
