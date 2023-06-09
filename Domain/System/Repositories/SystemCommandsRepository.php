<?php

namespace Domain\System\Repositories;

use App\Models\CronJob;
use Carbon\Carbon;
use Domain\CronJob\ValueObjects\Status;
use ErrorException;

class SystemCommandsRepository implements SystemBaseRepository
{

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
