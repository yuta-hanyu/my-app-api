<?php

declare(strict_types=1);

namespace Packages\Domain\TaskColumn;

use Packages\Domain\Task\TaskEntity;

class TaskColumnEntityWithTasks
{
    /**
     * @var TaskColumnId
     */
    private TaskColumnId|null $taskColumnId;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var int
     */
    private int $sort;

    /**
     * @var TaskEntity[]
     */
    private array $tasks;

    /**
     * @param TaskColumnId|null $taskColumnId
     * param int $userId
     * @param string $title
     * @param int $sort
     * @param TaskEntity[] $tasks
     */
    public function __construct(
        TaskColumnId|null $taskColumnId,
        int $userId,
        string $title,
        int $sort,
        array $tasks
    ) {
        $this->taskColumnId = $taskColumnId;
        $this->userId = $userId;
        $this->title = $title;
        $this->sort = $sort;
        $this->tasks = $tasks;
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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @return TaskEntity[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }
}
