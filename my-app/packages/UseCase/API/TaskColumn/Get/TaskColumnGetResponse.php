<?php

declare(strict_types=1);

namespace Packages\UseCase\API\TaskColumn\Get;

use Packages\Domain\TaskColumn\TaskColumnEntity;

class TaskColumnGetResponse
{
    /**
     * @var TaskColumnEntity[]
     */
    public array $taskColumns;

    /**
     * @param TaskColumnEntity[] $taskColumns
     */
    public function __construct(
        array $taskColumns
    ) {
        $this->taskColumns = $taskColumns;
    }
}
