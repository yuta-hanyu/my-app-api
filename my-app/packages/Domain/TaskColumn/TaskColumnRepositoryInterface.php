<?php

declare(strict_types=1);

namespace Packages\Domain\TaskColumn;

interface TaskColumnRepositoryInterface
{
    /**
     * @return TaskColumnEntity[]
     */
    public function getTaskColumns(): array;

    /**
     * @return TaskColumnEntity[]
     */
    public function getTaskColumnsByUserId(int $userId): array;

    /**
     * @param TaskColumnEntity $taskColumnEntity
     * @return TaskColumnEntity
     */
    public function update(TaskColumnEntity $taskColumnEntity): TaskColumnEntity;
}
