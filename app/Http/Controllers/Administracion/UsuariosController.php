<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\CentroFormacion;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $user = User::with(['roles', 'centro_formacion.regionales'])->get();
        return $this->estructuraApi->toResponse($user);
    }
}
