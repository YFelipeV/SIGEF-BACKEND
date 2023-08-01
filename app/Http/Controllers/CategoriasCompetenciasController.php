<?php

namespace App\Http\Controllers;

use App\Models\AliadoCategoriaHabilidad;
use App\Models\CategoriaHabilidad;
use App\Models\Categorias_competencias;
use App\Models\Programa_formacion_categoria_habilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriasCompetenciasController extends Controller
{
    public function index()
    {

        $categoriasCompetencias = Categorias_competencias::with(['competencias', 'modalidades','categorias'])->get();

        return  $this->estructuraApi->toResponse($categoriasCompetencias);
    }

    public function show($id)
    {

        $categoriasCompetencias = Categorias_competencias::with(['competencias', 'modalidades','categorias'])->find($id);

        return  $this->estructuraApi->toResponse($categoriasCompetencias);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'numero_participantes'                    => 'required',
            'cantidad_grupos'                  => 'nullable',
            'categoria_habilidad_id'               => 'nullable',
            'competencia_id'   => 'required',
            'modalidad_id'   => 'required',

        ]);

        if ($validator->fails()) {

            $this->estructuraApi->setResponse('Error', 'ERR-001', $validator->errors());
            return $this->estructuraApi->toResponse(null);
        }




        $categoriaHabilida = new Categorias_competencias();
        $categoriaHabilida->numero_participantes = $request->numero_participantes;
        $categoriaHabilida->cantidad_grupos = $request->cantidad_grupos;
        $categoriaHabilida->categoria_habilidad_id = $request->categoria_habilidad_id;
        $categoriaHabilida->competencia_id = $request->competencia_id;
        $categoriaHabilida->modalidad_id = $request->modalidad_id;
        $categoriaHabilida->save();



        $this->estructuraApi->setResponse('success', 'SUC-001', 'categoria registrada');
        return $this->estructuraApi->toResponse(null);
    }
}
