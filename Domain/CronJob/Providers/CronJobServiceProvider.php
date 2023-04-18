<?php

namespace Domain\CronJob\Providers;

use Domain\CronJob\Repositories\CronJobBaseRepository;
use Domain\CronJob\Repositories\CronJobRepository;
use Illuminate\Support\ServiceProvider;

class CronJobServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
          CronJobBaseRepository::class,
          CronJobRepository::class
        );
    }
}
