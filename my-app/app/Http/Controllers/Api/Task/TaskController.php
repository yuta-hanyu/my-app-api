<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskId;
use Packages\Domain\TaskColumn\TaskColumnId;
use Packages\UseCase\API\Task\Update\TaskUpdateInteractorInterface;
use Packages\UseCase\API\Task\Update\TaskUpdateRequest;
use Throwable;

class TaskController extends Controller
{
    public function updateTasks(
        UpdateTaskRequest $request,
        TaskUpdateInteractorInterface $interactor
    ): JsonResponse {
        $taskList = [];
        foreach ($request->input('tasks') as $task) {
            $taskList[] = new TaskUpdateRequest(
                '羽生',
                new TaskId($task['task_id']),
                new TaskColumnId($task['task_column_id']),
                $task['user_id'],
                $task['title'],
                $task['sort']
            );
        }
        return $interactor->handle($taskList);
    }
}
