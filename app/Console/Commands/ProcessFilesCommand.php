<?php

namespace App\Console\Commands;

use App\Repository\Product\ProductBaseRepository;
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
    protected $description = 'Comando responsável por processar os arquivos';

    /**
     * Execute the console command.
     */
    public function handle(ProductBaseRepository $repository)
    {
        $filesName = [
            'products_01.json.gz',
            'products_02.json.gz',
            'products_03.json.gz',
            'products_04.json.gz',
            'products_05.json.gz',
            'products_06.json.gz',
            'products_07.json.gz',
            'products_08.json.gz',
            'products_09.json.gz',
        ];

        foreach ($filesName as $fileName) {

            $this->info("[ARQUIVO: $fileName] está sendo verificado");
            $urlStream = "https://challenges.coode.sh/food/data/json/$fileName";

            try {
                $stream = gzopen($urlStream, 'rb');
                if (!$stream) {
                    throw new Exception("Não foi possível abrir o arquivo: {$fileName}");
                }
            } catch (Exception $exception) {
                $this->info("[ARQUIVO: $fileName] Não foi possível abrir para leitura");
                Log::error($exception->getMessage());
            }

            $this->info("[ARQUIVO: $fileName] Iniciando processamento de leitura...");
            for ($line = 1; $line <= 100; $line++) {
                if (feof($stream)) {
                    break;
                }

                $getLine = fgets($stream);
                $jsonDecoded = json_decode($getLine, true);

                $repository->createOrUpdate($jsonDecoded);
            }
            $this->info("[ARQUIVO: $fileName] Arquivo lido com sucesso!");
            gzclose($stream);
        }
    }
}
