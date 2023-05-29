<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

class TaskColumnGetRequest
{
    /**
     * @var string
     */
    private string $userName;

    /**
     * @var int
     */
    private int $userId;

    public function __construct(string $userName, int $userId)
    {
        $this->userName = $userName;
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}

