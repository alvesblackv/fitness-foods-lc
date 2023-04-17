<?php

namespace App\Services;

use App\Exceptions\FileNotReadableException;
use App\Repository\Product\ProductBaseRepository;
use Exception;

class OpenFoodService implements ApiFoodInterface
{
    public function __construct(private readonly ProductBaseRepository $repository)
    {
    }

    public function getFilesName(): array
    {
        return [
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
    }

    /**
     * @throws Exception
     */
    public function readStream($fileName)
    {
        $urlStream = "https://challenges.coode.sh/food/data/json/$fileName";

        $stream = gzopen($urlStream, 'rb');
        if (!$stream) {
            throw new FileNotReadableException($fileName);
        }

        return $stream;
    }
    public function processStream($stream)
    {
        for ($line = 1; $line <= 100; $line++) {
            if (feof($stream)) {
                break;
            }

            $getLine = fgets($stream);
            $jsonDecoded = json_decode($getLine, true);

            $this->repository->createOrUpdate($jsonDecoded);
        }

        gzclose($stream);
    }
}
