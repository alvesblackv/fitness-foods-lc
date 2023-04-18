<?php

namespace App\Console\Commands;

use App\Services\ApiFoodInterface;
use Domain\CronJob\Repositories\CronJobBaseRepository;
use Domain\CronJob\ValueObjects\Status;
use Exception;
use Illuminate\Console\Command;
use Log;

class ProcessFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando responsável por processar a API';

    public function handle(ApiFoodInterface $apiFood, CronJobBaseRepository $cronJobRepository)
    {
        foreach ($apiFood->getFilesName() as $fileName) {

            $this->info("[ARQUIVO: $fileName] está sendo verificado");

            try {
                $stream = $apiFood->readStream($fileName);

                $this->info("[ARQUIVO: $fileName] Iniciando processamento de leitura...");
                $apiFood->processStream($stream);

                $this->info("[ARQUIVO: $fileName] Arquivo lido com sucesso!");
                $cronJobRepository->storeCronStatus($fileName, Status::DONE);
            } catch (Exception $exception) {
                $cronJobRepository->storeCronStatus($fileName, Status::FAILURE);
                $this->info("[ARQUIVO: $fileName] Não foi possível abrir para leitura");
                Log::error($exception->getMessage());
            }
        }
    }
}
