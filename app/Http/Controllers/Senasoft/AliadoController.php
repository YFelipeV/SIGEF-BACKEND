<?php

namespace App\Http\Controllers\Senasoft;

use App\Http\Controllers\Controller;
use App\Models\Aliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AliadoController extends Controller
{
    public function index()
    {

        $aliados = Aliado::all();

        return $this->estructuraApi->toResponse($aliados);
    }

    public function show($id)
    {

        $aliado = Aliado::find($id);

        return $this->estructuraApi->toResponse($aliado);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'aliado'                    => 'required|string|unique:aliados|max:150',
            'logotipo'                  => 'nullable',
            'descripcion'               => 'nullable|string',
            'telefono'                  => 'required',
            'correo'                    => 'required|string|max:50',
            'contacto_aliado'           => 'nullable|string|max:100',
            'correo_contacto_aliado'    => 'nullable|string|max:50'
        ]);

        if ($validator->fails()) {

            $this->estructuraApi->setResponse('Error', 'ERR-001', $validator->errors());
            return $this->estructuraApi->toResponse(null);
        }
        $nombreLogotipo = null;

        if ($request->hasFile("logotipo")) {
            $logotipo = $request->file("logotipo");
            $nombreLogotipo = $logotipo->getClientOriginalName();
            $logotipo->move("images/aliados/logotipos/", $nombreLogotipo);
        }



        

        $aliado = new Aliado();
        $aliado->aliado = $request->aliado;
        $aliado->logotipo = $nombreLogotipo;
        $aliado->descripcion = $request->descripcion;
        $aliado->telefono = $request->telefono;
        $aliado->correo = $request->correo;
        $aliado->contacto_aliado = $request->contacto_aliado;
        $aliado->correo_contacto_aliado = $request->correo_contacto_aliado;
        $aliado->save();

        $this->estructuraApi->setResponse('success', 'SUC-001', 'Aliado con éxito');
        return $this->estructuraApi->toResponse(null);
    }
}
