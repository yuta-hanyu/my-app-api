<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetResponse;

interface TaskColumnGetPresenterInterface
{
    /**
     * @param TaskColumnGetResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskColumnGetResponse $outputData): JsonResponse;
}
