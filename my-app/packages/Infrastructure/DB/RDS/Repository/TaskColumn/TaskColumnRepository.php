<?php

declare(strict_types=1);

namespace Packages\Infrastructure\DB\RDS\Repository\TaskColumn;

use App\Models\TaskColumn\TaskColumn;
use Illuminate\Support\Facades\DB;
use Packages\Domain\TaskColumn\TaskColumnEntity;
use Packages\Domain\TaskColumn\TaskColumnId;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;

class TaskColumnRepository implements TaskColumnRepositoryInterface
{
    /**
     * @const string[]
     */
    private const COLUMN = [
        'task_column_id',
        'user_id',
        'title',
        'sort'
    ];

    /**
     * @return TaskColumnEntity[]
     */
    public function getTaskColumns(): array
    {
        $taskColumns = TaskColumn::select(self::COLUMN)
            ->get();
        $taskColumnList = $taskColumns->map(function ($taskColum) {
            return $this->getEntityByModel($taskColum);
        });
        return $taskColumnList->all();
    }

    /**
     * @param TaskColumnColumn $task
     * @return TaskColumnEntity
     */
    private function getEntityByModel(TaskColumn $taskColumn): TaskColumnEntity
    {
        return new TaskColumnEntity(
            new TaskColumnId($taskColumn->task_column_id),
            $taskColumn->user_id,
            $taskColumn->title,
            $taskColumn->sort
        );
    }
}
