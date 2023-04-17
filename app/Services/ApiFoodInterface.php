<?php

namespace App\Services;

interface ApiFoodInterface
{
    public function getFilesName(): array;

    public function readStream($fileName);

    public function processStream($stream);
}
