<?php

declare(strict_types=1);

namespace Packages\Interfaces\Presenters\API\Task;

use Illuminate\Http\JsonResponse;
use Packages\Domain\Task\TaskEntity;
use Packages\UseCase\API\Task\Update\TaskUpdatePresenterInterface;
use Packages\UseCase\API\Task\Update\TaskUpdateResponse;
use Illuminate\Support\Facades\Log;

use function response;

class TaskUpdatePresenter implements TaskUpdatePresenterInterface
{
    /**
     * @param TaskEntity $tasks
     * @return array<string,mixed>
     */
    public function accountEntitytoArray(
        TaskEntity $tasks
    ): array {
        return [
            'task_id' => $tasks->getTaskId()?->getValue(),
            'task_column_id' => $tasks->getTaskColumnId()?->getValue(),
            'user_id' => $tasks->getUserId(),
            'title' => $tasks->getTitle(),
            'sort' => $tasks->getSort()
        ];
    }

    /**
     * @param TaskUpdateResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskUpdateResponse $outputData): JsonResponse
    {
        $response = [];
        Log::debug(print_r($outputData->tasks, true));

        foreach ($outputData->tasks as $task) {
            $response[] = $this->accountEntitytoArray($task);
        }
        return response()->json($response ?? []);
    }
}
