<?php

namespace Domain\CronJob\ValueObjects;

enum Status
{
    case DONE;
    case FAILURE;

    public function getStatus(): string
    {
        return match ($this) {
            Status::DONE => 'DONE',
            Status::FAILURE => 'FAILURE'
        };
    }
}
