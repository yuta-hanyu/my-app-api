<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Update;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\Domain\TaskColumn\TaskColumnEntity;
use Packages\Domain\TaskColumn\TaskColumnEntityWithTasks;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;
use Packages\Domain\TransactionInterface;

class TaskColumnUpdateInteractor implements TaskColumnUpdateInteractorInterface
{
    /**
     * @var TransactionInterface
     */
    private TransactionInterface $transaction;

    /**
     * @var TaskColumnRepositoryInterface
     */
    private TaskColumnRepositoryInterface $taskColumnRepository;

    /**
    * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $taskRepository;

    /**
     * @var TaskColumnUpdatePresenterInterface
     */
    private TaskColumnUpdatePresenterInterface $presenter;

    /**
     * @param TaskColumnRepositoryInterface $taskColumnRepository
     * @param TaskColumnUpdatePresenterInterface $presenter
     */
    public function __construct(
        TransactionInterface $transaction,
        TaskColumnRepositoryInterface $taskColumnRepository,
        TaskRepositoryInterface $taskRepository,
        TaskColumnUpdatePresenterInterface $presenter,
    ) {
        $this->transaction = $transaction;
        $this->taskColumnRepository = $taskColumnRepository;
        $this->taskRepository = $taskRepository;
        $this->presenter = $presenter;
    }
    /**
     * @param TaskColumnUpdateRequest[] $request
     * @return JsonResponse
     */
    public function handle(array $request): JsonResponse
    {
        $response = $this->transaction->scope(function () use ($request) {
            $targetTaskColumn = null;
            foreach($request as $taskColum) {
                $targetTaskColumn = $this->updateTaskColumn($taskColum);
            }

            $taskColumns = $this->taskColumnRepository->getTaskColumnsByUserId($targetTaskColumn->getUserId());

            $newList = [];
            foreach ($taskColumns as $taskColumn) {
                $newList[] = new TaskColumnEntityWithTasks(
                    $taskColumn->getTaskColumnId(),
                    $taskColumn->getUserId(),
                    $taskColumn->getTitle(),
                    $taskColumn->getSort(),
                    $this->taskRepository->getTasksByTaskColumnId($taskColumn)
                );
            };
            return new TaskColumnUpdateResponse($newList);
        });
        return $this->presenter->output($response);
    }

        /**
     * @param TaskColumnUpdateRequest $request
     * @return TaskColumnEntity
     */
    private function updateTaskColumn(TaskColumnUpdateRequest $request): TaskColumnEntity
    {
        $updateTaskColumn = new TaskColumnEntity(
            $request->getTaskColumnId(),
            $request->getUserId(),
            $request->getTitle(),
            $request->getSort()
        );
        return $this->taskColumnRepository->update($updateTaskColumn);
    }
}
