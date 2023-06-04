<?php

declare(strict_types=1);

namespace Packages\UseCase\API\Task\Update;

use Illuminate\Http\JsonResponse;
use Packages\UseCase\API\Task\Update\TaskUpdateResponse;

interface TaskUpdatePresenterInterface
{
    /**
     * @param TaskUpdateResponse $outputData
     * @return JsonResponse
     */
    public function output(TaskUpdateResponse $outputData): JsonResponse;
}
