<?php

namespace Domain\CronJob\Repositories;

use App\Models\CronJob;
use Carbon\Carbon;
use Domain\CronJob\ValueObjects\Status;
use ErrorException;

class CronJobRepository implements CronJobBaseRepository
{

    public function storeCronStatus(string $fileName, Status $status)
    {
        CronJob::create([
            'file_name' => $fileName,
            'status' => $status->getStatus()
        ]);
    }

    public function getLastCronJob(): string
    {
        return CronJob::latest('created_at')
            ->value('created_at');
    }
}
