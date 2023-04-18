<?php

namespace Domain\System\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\CronJob\Repositories\CronJobBaseRepository;
use Domain\System\Repositories\SystemBaseRepository;

class ShowSystemInfoController extends Controller
{
    public function __construct(private readonly CronJobBaseRepository $cronJobRepository, private readonly SystemBaseRepository $systemRepository)
    {
    }
    public function __invoke()
    {
        return [
            'is_writing_and_reading' => $this->systemRepository->checkReadWrite(),
            'last_execute_cron' => $this->cronJobRepository->getLastCronJob(),
            'uptime_online' => $this->systemRepository->getUpTime(),
            'memory_usage' => $this->systemRepository->getMemoryUsage()
        ];
    }
}
