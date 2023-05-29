<?php

declare(strict_types=1);

namespace Packages\Domain\Task;

use Packages\Domain\TaskColumn\TaskColumnId;

class TaskEntity
{
    /**
     * @var TaskId
     */
    private TaskId|null $taskId;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @var TaskColumnId
     */
    private TaskColumnId|null $taskColumnId;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var int
     */
    private int $sort;

    /**
     * @param TaskId|null $taskId
     * param int $userId
     * @param TaskColumnId|null $taskColumnId
     * @param string $title
     * @param int $sort
     */
    public function __construct(
        TaskId|null $taskId,
        int $userId,
        TaskColumnId|null $taskColumnId,
        string $title,
        int $sort
    ) {
        $this->taskId = $taskId;
        $this->userId = $userId;
        $this->taskColumnId = $taskColumnId;
        $this->title = $title;
        $this->sort = $sort;
    }

    /**
     * @return TaskId|null
     */
    public function getTaskId(): ?TaskId
    {
        return $this->taskId;
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
