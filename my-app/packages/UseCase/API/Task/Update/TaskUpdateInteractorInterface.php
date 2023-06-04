<?php

declare(strict_types=1);

namespace Packages\UseCase\API\Task\Update;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\Task\Update\TaskUpdateRequest;

interface TaskUpdateInteractorInterface
{
    /**
     * @param TaskUpdateRequest[] $request
     * @return JsonResponse
     */
    public function handle(array $request): JsonResponse;
}
