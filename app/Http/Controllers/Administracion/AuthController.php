<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller

{

    public function userProfile()
    {
        $usuario = auth()->user()->load(['roles', 'centro_formacion']);

        return $this->estructuraApi->toResponse($usuario);
    }

    public function registro(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'identificacion' => 'required|unique:usuarios',
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:usuarios',
            'correo_verificado_en' => 'required',
            'password' => 'required|min:6',
            'rol_id' => 'required',
            'centro_formacion_id' => 'required',
        ]);

        if ($validator->fails()) {
            $this->estructuraApi->setResponse('error', 'ERR-001', $validator->errors());

            return $this->estructuraApi->toResponse(null);
        }

        $newUser = new User();
        $newUser->identificacion = $request->identificacion;
        $newUser->nombres = $request->nombres;
        $newUser->apellidos = $request->apellidos;
        $newUser->telefono = $request->telefono;
        $newUser->correo = $request->correo;
        $newUser->correo_verificado_en = $request->correo_verificado_en;
        $newUser->password = Hash::make($request->password);
        $newUser->rol_id = $request->rol_id;
        $newUser->centro_formacion_id = $request->centro_formacion_id;
        $newUser->save();
        $this->estructuraApi->setResponse('Success', 'SUC-001', 'Usuario registrado con exito');
        return $this->estructuraApi->toResponse(null);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'password' => 'required|min:6',

        ]);

        if ($validator->fails()) {
            return \response()->json($validator->errors());
        }

        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return $this->estructuraApi->toResponse([['token' => $token]]);
        } else {
            $this->estructuraApi->setResponse('error', 'ERR-001', 'Credenciales invalidas');
            return $this->estructuraApi->toResponse(null);
        }
    }


    public function logout()
    {
        Auth::user()->tokens()->delete();
        $this->estructuraApi->setResponse('Success', 'SUC-001', 'se cerro la session correctamente');
        return $this->estructuraApi->toResponse(null);
    }


    
    
    
}


