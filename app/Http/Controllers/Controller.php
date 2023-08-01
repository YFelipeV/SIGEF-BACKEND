<?php

namespace App\Http\Controllers;


use App\Api\Estructura;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $estructuraApi;

    public function __construct()
    {
        $this->estructuraApi = new Estructura();
    }
}
