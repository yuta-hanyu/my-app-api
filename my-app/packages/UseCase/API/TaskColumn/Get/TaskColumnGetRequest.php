<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

class TaskColumnGetRequest
{
    /**
     * @var string
     */
    private string $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }
}

