<?php

namespace App\Providers;



use App\Interfaces\Service\ConclusaoCursoService;
use App\Services\ConclusaoCursoServiceImpl;
use Illuminate\Support\ServiceProvider;

class ConclusaoCursoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ConclusaoCursoService::class, ConclusaoCursoServiceImpl::class);
    }
}
