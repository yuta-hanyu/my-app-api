<?php

declare(strict_types=1);

namespace Packages\Domain\Task;

use Packages\Domain\TaskColumn\TaskColumnEntity;

interface TaskRepositoryInterface
{
    /**
     * @param TaskColumnEntity $taskColumn
     * @return array
     */
    public function getTasksByTaskColumnId(TaskColumnEntity $taskColum): array;

    /**
     * @param TaskEntity $task
     * @return TaskEntity
     */
    public function update(TaskEntity $task): TaskEntity;
}
