<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;


    public function moduloPadre()
    {

        return $this->belongsTo(Modulos::class, 'modulo_padre_id', 'id');
    }
    public function moduloHijo()
    {

        return $this->hasMany(Modulos::class, 'modulo_padre_id', 'id');
    }

    public function permisos($padre = null, $id)
    {
        $modulos = User::select('id')
            ->join('roles', 'usuarios.rol_id', '=', 'roles.id_rol')
            ->join('modulos_roles', 'modulos_roles.rol_id', '=', 'roles.id_rol')
            ->join('modulos', 'modulos_roles.modulo_id', '=', 'modulos.id_modulo')
            ->where('modulos.modulo_padre_id', $padre)
            ->where('usuarios.id_usuario', $id)
            ->get();

        return $modulos;
    }
}
