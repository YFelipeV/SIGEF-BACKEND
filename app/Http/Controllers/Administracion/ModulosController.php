<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Modulos;
use App\Models\Modulos_Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ModulosController extends Controller
{
    public function index()
    {

        $modulos = Modulos::with('modulos');


        return $this->estructuraApi->toResponse($modulos);
    }

    public function index2()
    {

        $modulos = Modulos_Roles::all();


        return $modulos;
    }


    public function moduloUsuario($id)
    {
        $modeloModulos = new Modulos();
        $modulos = $modeloModulos->permisos(null, $id);
    
        return response()->json($modulos);
    }
}
