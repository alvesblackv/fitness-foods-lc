<?php

namespace Domain\Product\Providers;

use Domain\Product\Repositories\ProductBaseRepository;
use Domain\Product\Repositories\ProductEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
          ProductBaseRepository::class,
          ProductEloquentRepository::class
        );
    }
}
