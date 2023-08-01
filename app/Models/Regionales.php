<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regionales extends Model
{
    use HasFactory;

    public function centroformacion()
    {

        return $this->belongsToMany(CentroFormacion::class);
    }
}
