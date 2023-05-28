<?php

declare(strict_types=1);

namespace Packages\Domain\TaskColumn;

class TaskColumnEntity
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
     * @param TaskColumnId|null $taskColumnId
     * param int $userId
     * @param string $title
     * @param int $sort
     */
    public function __construct(
        TaskColumnId|null $taskColumnId,
        int $userId,
        string $title,
        int $sort
    ) {
        $this->taskColumnId = $taskColumnId;
        $this->userId = $userId;
        $this->title = $title;
        $this->sort = $sort;
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
}
