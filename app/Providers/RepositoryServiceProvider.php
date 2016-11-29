<?php

namespace SerEducacional\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SerEducacional\Repositories\PessoaFisicaRepository::class, \SerEducacional\Repositories\PessoaFisicaRepositoryEloquent::class);
        //:end-bindings:
    }
}