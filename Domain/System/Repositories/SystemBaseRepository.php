<?php

namespace Domain\System\Repositories;

interface SystemBaseRepository
{
    public function getUpTime(): string;

    public function getMemoryUsage(): string;

    public function checkReadWrite(): bool;
}
