<?php

declare(strict_types=1);

namespace Packages\Interfaces\Presenters\API\TaskColumn;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskEntity;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetPresenterInterface;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetResponse;

use function response;

class TaskColumnGetPresenter implements TaskColumnGetPresenterInterface
{
    /**
     * @param TaskColumnEntityWithTasks $taskColumnWithTasks
     * @return array<string,mixed>
     */
    public function accountEntitytoArray(
        TaskColumnEntityWithTasks $taskColumnWithTasks
    ): array {
        return [
            'task_column_id' => $taskColumnWithTasks->getTaskColumnId()?->getValue(),
            'user_id' => $taskColumnWithTasks->getUserId(),
            'title' => $taskColumnWithTasks->getTitle(),
            'sort' => $taskColumnWithTasks->getSort(),
            'tasks' => $this->getTasks($taskColumnWithTasks->getTasks())
        ];
    }

    /**
     * @param TaskEntity[] $tasks
     * @return TaskEntity[]
     */
    private function getTasks(array $tasks): ?array
    {
        $taskList = [];
        foreach ($tasks as $task) {
            if ($task->getTaskId()->getValue()) {
                $taskList[] = [
                    'taskId' => $task->getTaskId()->getValue(),
                    'taskColumnId' => $task->getTaskColumnId()->getValue(),
                    'userId' => $task->getUserId(),
                    'sort' => $task->getSort(),
                    'title' => $task->getTitle()
                ];
            }
        }
        return $taskList ?: null;
    }

    /**
     * @param TaskColumnGetResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskColumnGetResponse $outputData): JsonResponse
    {
        foreach ($outputData->taskColumnWithTasks as $taskColumn) {
            $response[] = $this->accountEntitytoArray($taskColumn);
        }
        return response()->json($response ?? []);
    }
}
