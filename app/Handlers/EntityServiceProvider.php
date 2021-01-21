<?php

namespace App\Handlers;

use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    public function register()
    {
        //master
        $this->app->bind('App\Handlers\Interfaces\PedidoEntityInterface', 'App\Handlers\Repositories\PedidoEntityRepository');
        
    }
}