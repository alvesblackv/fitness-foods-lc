<?php

namespace Domain\System\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\CronJob\Repositories\CronJobBaseRepository;

class ShowSystemInfoController extends Controller
{
    public function __construct(private readonly CronJobBaseRepository $cronJobRepository)
    {
    }
    public function __invoke()
    {
        return [
            'is_writing_and_reading' => $this->cronJobRepository->checkReadWrite(),
            'last_execute_cron' => $this->cronJobRepository->getLastCronJob(),
            'uptime_online' => $this->cronJobRepository->getUpTime(),
            'memory_usage' => $this->cronJobRepository->getMemoryUsage()
        ];
    }
}
