<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;

class TaskColumnGetInteractor implements TaskColumnGetInteractorInterface
{
    /**
     * @var TaskColumnRepositoryInterface
     */
    private TaskColumnRepositoryInterface $taskColumnRepository;

    /**
     * @var TaskColumnGetPresenterInterface
     */
    private TaskColumnGetPresenterInterface $presenter;

    /**
     * @param TaskColumnRepositoryInterface $taskColumnRepository
     * @param TaskColumnGetPresenterInterface $presenter
     */
    public function __construct(
        TaskColumnRepositoryInterface $taskColumnRepository,
        TaskColumnGetPresenterInterface $presenter
    ) {
        $this->taskColumnRepository = $taskColumnRepository;
        $this->presenter = $presenter;
    }
    /**
     * @param TaskColumnGetRequest $request
     * @return JsonResponse
     */
    public function handle(TaskColumnGetRequest $request): JsonResponse
    {
        $taskColumns = $this->taskColumnRepository->getTaskColumns();
        $outputData = new TaskColumnGetResponse($taskColumns);
        return $this->presenter->output($outputData);
    }
}
