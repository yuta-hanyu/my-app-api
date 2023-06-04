<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Update;

use Illuminate\Support\Facades\Log;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;

class TaskColumnUpdateResponse
{
    /**
     * @var TaskColumnEntityWithTasks[]
     */
    public array $taskColumnWithTasks;

    /**
     * @param TaskColumnEntityWithTasks[] $taskColumnWithTasks
     */
    public function __construct(
        array $taskColumnWithTasks
    ) {
        $this->taskColumnWithTasks = $taskColumnWithTasks;
    }
}
