<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{

    public function index()
    {
        $competencia = Competencia::with('centrosFormacion.regionales')->get();
        return $this->estructuraApi->toResponse($competencia);
    }

    public function show($id)
    {
        $competencia = Competencia::with('centrosFormacion.regionales')->find($id);
        return $this->estructuraApi->toResponse($competencia);
    }

    public function store(Request $request)
    {

        $comeptenci = new Competencia();
        $comeptenci->competencia = $request->competencia;
        $comeptenci->fecha_inicio = $request->fecha_inicio;
        $comeptenci->fecha_fin = $request->fecha_fin;
        $comeptenci->lugar = $request->lugar;
        $comeptenci->direccion = $request->direccion;
        $comeptenci->save();
        $this->estructuraApi->setResponse('Sucess', 'SUC001', 'competencia registrada');
        return $this->estructuraApi->toResponse(null);
    }
}
