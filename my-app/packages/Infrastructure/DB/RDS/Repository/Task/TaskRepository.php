<?php

declare(strict_types=1);

namespace Packages\Infrastructure\DB\RDS\Repository\Task;

use App\Models\Task\Task;
use App\Models\TaskColumn\TaskColumn;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskEntity;
use Packages\Domain\Task\TaskId;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\TaskColumn\TaskColumnEntity;
use Packages\Domain\TaskColumn\TaskColumnId;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetRequest;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @const string[]
     */
    private const COLUMN = [
        'task_id',
        'task_column_id',
        'user_id',
        'title',
        'sort'
    ];

    /**
     * @param TaskColumnEntity $taskColumn
     * @return TaskEntity[]
     */
    public function getTasksByTaskColumnId(TaskColumnEntity $taskColumn): array
    {
        $tasks = Task::select(self::COLUMN)
        ->where('user_id', $taskColumn->getUserId())
        ->where('task_column_id', $taskColumn->getTaskColumnId()->getValue())
        ->get();
        $taskList = $tasks->map(function ($task) {
            return $this->getEntityByModel($task);
        });
        return $taskList->all();
    }

    /**
     * @param mixed $task
     * @return TaskEntity
     */
    private function getEntityByModel(Task $task): TaskEntity
    {
        return new TaskEntity(
            new TaskId($task->task_id),
            $task->user_id,
            new TaskColumnId($task->task_id),
            $task->title,
            $task->sort
        );
    }
}
