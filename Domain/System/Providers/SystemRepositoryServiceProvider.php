<?php

namespace Domain\System\Providers;

use Domain\System\Repositories\SystemBaseRepository;
use Domain\System\Repositories\SystemCommandsRepository;
use Illuminate\Support\ServiceProvider;

class SystemRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
          SystemBaseRepository::class,
          SystemCommandsRepository::class
        );
    }
}
