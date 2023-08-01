<?php

namespace App\Models;

use App\Http\Controllers\Administracion\UsuariosController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    const CREATED_AT = 'creado_el';
    const UPDATED_AT = 'actualizado_el';

    public function usuario()
    {

        return $this->belongsToMany(User::class);
    }
}
