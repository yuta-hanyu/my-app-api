<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Illuminate\Support\Facades\Log;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;

class TaskColumnGetResponse
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
