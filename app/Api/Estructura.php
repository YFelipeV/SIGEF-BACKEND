<?php

namespace App\Api;

use Illuminate\Contracts\Support\Responsable;

class Estructura implements Responsable
{
    private $status = 'success';
    private $code = 'SUC-001';
    private $message = null;
    private $action = 'next';
    private $show = true;
    private $delay = null;
    private $debug = '';


    public function setResponse($estado, $codigo, $mensaje)
    {

        $this->status = $estado;
        $this->code = $codigo;
        $this->message = $mensaje;
    }

    public function toResponse($request)
    {
        if (
            $this->status == "error"
        ) {
            $this->action = "stop";
        }

        return [

            "status" => $this->status,
            "code" => $this->code,
            "message" => $this->message,
            "action" => $this->action,
            "show" => $this->show,
            "delay" => $this->delay,
            "results" => $request
        ];
    }
}
