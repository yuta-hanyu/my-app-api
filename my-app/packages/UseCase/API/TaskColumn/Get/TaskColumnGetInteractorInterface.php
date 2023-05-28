<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetRequest;

interface TaskColumnGetInteractorInterface
{
    /**
     * @param TaskColumnGetRequest $request
     * @return JsonResponse
     */
    public function handle(TaskColumnGetRequest $request): JsonResponse;
}
