<?php

namespace App\Providers;

use App\Repository\Product\ProductBaseRepository;
use App\Repository\Product\ProductEloquentRepository;
use App\Services\ApiFoodInterface;
use App\Services\OpenFoodService;
use Illuminate\Support\ServiceProvider;

class ApiFoodServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
          ApiFoodInterface::class,
          OpenFoodService::class
        );
    }
}
