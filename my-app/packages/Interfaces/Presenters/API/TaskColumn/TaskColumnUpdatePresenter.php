<?php

declare(strict_types=1);

namespace Packages\Interfaces\Presenters\API\TaskColumn;

use Illuminate\Http\JsonResponse;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdatePresenterInterface;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateResponse;

use function response;

class TaskColumnUpdatePresenter implements TaskColumnUpdatePresenterInterface
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
                    'sort' => $task->getSort(),
                    'title' => $task->getTitle()
                ];
            }
        }
        return $taskList ?: null;
    }

    /**
     * @param TaskColumnUpdateResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskColumnUpdateResponse $outputData): JsonResponse
    {
        foreach ($outputData->taskColumnWithTasks as $taskColumn) {
            $response[] = $this->accountEntitytoArray($taskColumn);
        }
        return response()->json($response ?? []);
    }
}
