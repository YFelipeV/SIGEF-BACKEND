<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\CentroFormacion;
use Illuminate\Http\Request;

class CentroFormacionController extends Controller
{
    public function index()
    {

        $centros = CentroFormacion::all();

        return $this->estructuraApi->toResponse($centros);
    }
}
