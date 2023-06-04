<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Update;

use Packages\Domain\TaskColumn\TaskColumnId;

class TaskColumnUpdateRequest
{
    /**
     * @var string
     */
    private string $userName;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @var TaskColumnId|null
     */
    private TaskColumnId|null $taskColumnId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $sort;

    public function __construct(
        string $userName,
        int $userId,
        ?TaskColumnId $taskColumnId,
        string $title,
        int $sort
    ) {
        $this->userName = $userName;
        $this->userId = $userId;
        $this->taskColumnId = $taskColumnId;
        $this->title = $title;
        $this->sort = $sort;
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

    /**
     * @return TaskColumnId|null
     */
    public function getTaskColumnId(): ?TaskColumnId
    {
        return $this->taskColumnId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }
}

