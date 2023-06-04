<?php

declare(strict_types=1);

namespace Packages\Domain\Task;

use Packages\Domain\TaskColumn\TaskColumnEntity;

interface TaskRepositoryInterface
{
    /**
     * @param TaskColumnEntity $askColumn
     * @return array
     */
    public function getTasksByTaskColumnId(TaskColumnEntity $taskColum): array;
}
