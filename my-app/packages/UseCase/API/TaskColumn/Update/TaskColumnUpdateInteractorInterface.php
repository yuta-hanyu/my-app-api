<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Update;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateRequest;

interface TaskColumnUpdateInteractorInterface
{
    /**
     * @param TaskColumnUpdateRequest[] $request
     * @return JsonResponse
     */
    public function handle(array $request): JsonResponse;
}
