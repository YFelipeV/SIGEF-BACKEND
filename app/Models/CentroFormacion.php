<?php

namespace App\Models;

use App\Http\Controllers\Administracion\UsuariosController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroFormacion extends Model
{
    use HasFactory;
    protected $table        = 'centros_formacion';

    public function regionales()
    {
        return $this->belongsTo(Regionales::class, 'regional_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'usuario_id');
    }

    public function competencias(){

        return $this->hasMany(Competencia::class);
    }
}
