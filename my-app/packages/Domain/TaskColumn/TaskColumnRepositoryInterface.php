<?php

declare(strict_types=1);

namespace Packages\Domain\TaskColumn;

interface TaskColumnRepositoryInterface
{
    /**
     * @return TaskColumnEntity[]
     */
    public function getTaskColumns(): array;
}
