<?php

declare(strict_types=1);

namespace Packages\UseCase\API\Task\Update;

use Packages\Domain\Task\TaskId;
use Packages\Domain\TaskColumn\TaskColumnId;

class TaskUpdateRequest
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
     * @var TaskId|null
     */
    private TaskId|null $taskId;

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
        ?TaskId $taskId,
        ?TaskColumnId $taskColumnId,
        int $userId,
        string $title,
        int $sort
    ) {
        $this->userName = $userName;
        $this->taskId = $taskId;
        $this->taskColumnId = $taskColumnId;
        $this->userId = $userId;
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
     * @return TaskId|null
     */
    public function getTaskId(): ?TaskId
    {
        return $this->taskId;
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

