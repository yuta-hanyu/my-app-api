<?php

declare(strict_types=1);

namespace Packages\Interfaces\Presenters\API\TaskColumn;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Packages\Domain\TaskColumn\TaskColumnEntity;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetPresenterInterface;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetResponse;

use function response;

class TaskColumnGetPresenter implements TaskColumnGetPresenterInterface
{
    /**
     * @param TaskColumnEntity $taskColumn
     * @return array<string,mixed>
     */
    public function accountEntitytoArray(
        TaskColumnEntity $taskColumn
    ): array {
        return [
            'task_column_id' => $taskColumn->getTaskColumnId()?->getValue(),
            'user_id' => $taskColumn->getUserId(),
            'title' => $taskColumn->getTitle(),
            'sort' => $taskColumn->getSort(),
        ];
    }

    /**
     * @param TaskColumnGetResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskColumnGetResponse $outputData): JsonResponse
    {
        foreach ($outputData->taskColumns as $taskColumn) {
            $response[] = $this->accountEntitytoArray($taskColumn);
        }
        return response()->json($response ?? []);
    }
}
