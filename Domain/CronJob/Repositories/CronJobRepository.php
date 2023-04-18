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

    public function getUpTime(): string
    {
        $dateTurnedOn = Carbon::parse(shell_exec('uptime -s'))->timezone('America/Sao_Paulo');
        return now()->diffForHumans($dateTurnedOn);
    }

    public function getMemoryUsage(): string
    {
        $memoryUsage = ((memory_get_usage() / 1024) / 1024);
        return number_format($memoryUsage, 2) . ' MB';
    }

    /**
     * @throws ErrorException
     */
    public function checkReadWrite(): bool
    {
        try {
            $createdcronJob = CronJob::create(['file_name' => 'test', 'status' => Status::DONE->getStatus()]);

            if (!$createdcronJob) throw new ErrorException();

            $retrieveCronJob = CronJob::where('file_name', '=', $createdcronJob->file_name)->exists();
            if (!$retrieveCronJob) throw new ErrorException();

            $createdcronJob->delete();
            return true;
        } catch (ErrorException) {
            return false;
        }
    }
}
