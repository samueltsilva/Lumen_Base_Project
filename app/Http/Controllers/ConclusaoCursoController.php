<?php

namespace App\Http\Controllers;

use App\Interfaces\Service\ConclusaoCursoService;
use Illuminate\Http\Request;

class ConclusaoCursoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;

    public function __construct(ConclusaoCursoService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){
        var_dump($this->service->rs());
//        var_dump($this->service);exit();

    }

}
