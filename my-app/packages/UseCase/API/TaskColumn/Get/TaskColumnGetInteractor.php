<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;

class TaskColumnGetInteractor implements TaskColumnGetInteractorInterface
{
    /**
     * @var TaskColumnRepositoryInterface
     */
    private TaskColumnRepositoryInterface $taskColumnRepository;

    /**
     * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $taskRepository;

    /**
     * @var TaskColumnGetPresenterInterface
     */
    private TaskColumnGetPresenterInterface $presenter;

    /**
     * @param TaskColumnRepositoryInterface $taskColumnRepository
     * @param TaskRepositoryInterface $taskRepository
     * @param TaskColumnGetPresenterInterface $presenter
     */
    public function __construct(
        TaskColumnRepositoryInterface $taskColumnRepository,
        TaskColumnGetPresenterInterface $presenter,
        TaskRepositoryInterface $taskRepository
    ) {
        $this->taskColumnRepository = $taskColumnRepository;
        $this->taskRepository = $taskRepository;
        $this->presenter = $presenter;
    }
    /**
     * @param TaskColumnGetRequest $request
     * @return JsonResponse
     */
    public function handle(TaskColumnGetRequest $request): JsonResponse
    {
        $taskColumns = $this->taskColumnRepository->getTaskColumns();
        Log::debug(print_r($taskColumns, true));

        $newList = [];
        foreach ($taskColumns as $taskColumn) {
            $newList[] = new TaskColumnEntityWithTasks(
                $taskColumn->getTaskColumnId(),
                $taskColumn->getUserId(),
                $taskColumn->getTitle(),
                $taskColumn->getSort(),
                $this->taskRepository->getTasksByTaskColumnId($taskColumn)
            );
        }

        $outputData = new TaskColumnGetResponse($newList);
        return $this->presenter->output($outputData);
    }
}
