<?php

namespace Domain\CronJob\Repositories;

use Domain\CronJob\ValueObjects\Status;

interface CronJobBaseRepository
{
    public function storeCronStatus(string $fileName, Status $status);

    public function getLastCronJob(): string;
}
