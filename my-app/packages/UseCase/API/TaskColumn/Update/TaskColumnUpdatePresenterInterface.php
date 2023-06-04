<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Update;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateResponse;

interface TaskColumnUpdatePresenterInterface
{
    /**
     * @param TaskColumnUpdateResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskColumnUpdateResponse $outputData): JsonResponse;
}
