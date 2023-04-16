<?php

namespace App\Providers;

use App\Repository\Product\ProductBaseRepository;
use App\Repository\Product\ProductEloquentRepository;
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
