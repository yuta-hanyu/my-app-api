<?php

declare(strict_types=1);

namespace Packages\UseCase\API\Task\Update;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
// use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\Task\TaskEntity;
use Packages\Domain\Task\TaskEntityWithTasks;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;
// use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\TransactionInterface;

class TaskUpdateInteractor implements TaskUpdateInteractorInterface
{
    /**
     * @var TransactionInterface
     */
    private TransactionInterface $transaction;

    /**
     * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $taskRepository;

    /**
     * @var TaskColumnRepositoryInterface
     */
    private TaskColumnRepositoryInterface $taskColumnRepository;

    /**
    * @var TaskRepositoryInterface
     */
    // private TaskRepositoryInterface $taskRepository;

    /**
     * @var TaskUpdatePresenterInterface
     */
    private TaskUpdatePresenterInterface $presenter;

    /**
     * @param TaskRepositoryInterface $taskRepository
     * @param TaskUpdatePresenterInterface $presenter
     */
    public function __construct(
        TransactionInterface $transaction,
        TaskRepositoryInterface $taskRepository,
        TaskUpdatePresenterInterface $presenter,
    ) {
        $this->transaction = $transaction;
        $this->taskRepository = $taskRepository;
        $this->presenter = $presenter;
    }
    /**
     * @param TaskUpdateRequest[] $request
     * @return JsonResponse
     */
    public function handle(array $request): JsonResponse
    {
        $response = $this->transaction->scope(function () use ($request) {
            $targetTask = [];
            foreach($request as $task) {
                $targetTask[] = $this->updateTask($task);
            }
            return new TaskUpdateResponse($targetTask);
        });
        return $this->presenter->output($response);
    }

    /**
     * @param TaskUpdateRequest $request
     * @return TaskEntity
     */
    private function updateTask(TaskUpdateRequest $request): TaskEntity
    {
        $updateTask = new TaskEntity(
            $request->getTaskId(),
            $request->getUserId(),
            $request->getTaskColumnId(),
            $request->getTitle(),
            $request->getSort()
        );
        return $this->taskRepository->update($updateTask);
    }
}
