<?php

declare(strict_types=1);

namespace Packages\UseCase\API\Task\Update;

use Illuminate\Support\Facades\Log;
use Packages\Domain\Task\TaskEntity;

class TaskUpdateResponse
{
    /**
     * @var TaskEntity[]
     */
    public array $tasks;

    /**
     * @param TaskEntity[] $tasks[]
     */
    public function __construct(
        array $tasks
    ) {
        $this->tasks = $tasks;
    }
}
