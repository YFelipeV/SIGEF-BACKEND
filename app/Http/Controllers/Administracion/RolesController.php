<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {

        $roles = Roles::all();
        return $this->estructuraApi->toResponse($roles);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'perfil' => 'required'
        ]);
        if ($validator->fails()) {
            $this->estructuraApi->setResponse('Error', 'ERR001', $validator->errors());
            return $this->estructuraApi->toResponse(null);
        }

        $rol=new Roles();
        $rol->perfil=$request->perfil;
        $rol->save();

        $this->estructuraApi->setResponse('Success', 'SUC001', 'rol creado con exito');
        return $this->estructuraApi->toResponse(null);
    }
}
