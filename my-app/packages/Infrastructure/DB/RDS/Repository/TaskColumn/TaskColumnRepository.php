<?php

declare(strict_types=1);

namespace Packages\Infrastructure\DB\RDS\Repository\TaskColumn;

use App\Models\TaskColumn\TaskColumn;
use Exception;
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
            ->orderBy('sort')
            ->get();
        $taskColumnList = $taskColumns->map(function ($taskColum) {
            return $this->getEntityByModel($taskColum);
        });
        return $taskColumnList->all();
    }

    /**
     * @return TaskColumnEntity[]
     */
    public function getTaskColumnsByUserId(int $userId): array
    {
        $taskColumns = TaskColumn::select(self::COLUMN)
            ->where('user_id', $userId)
            ->orderBy('sort')
            ->get();
        $taskColumnList = $taskColumns->map(function ($taskColum) {
            return $this->getEntityByModel($taskColum);
        });
        return $taskColumnList->all();
    }

    /**
     * @param TaskColumnEntity $taskColumnEntity
     * @return TaskColumnEntity
     * @throws Exception
     */
    public function update(TaskColumnEntity $taskColumnEntity): TaskColumnEntity
    {
        $request = $this->updateTaskColumnEntityToArray($taskColumnEntity);
        $taskColumnEntity->getTaskColumnId() ?? throw new Exception('failed getTaskColumnId');
        $taskColumn = TaskColumn::findOrFail($taskColumnEntity->getTaskColumnId()->getValue());
        $taskColumn->fill($request)->save();
        return $this->getEntityByModel($taskColumn);
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

    /**
     * @param TaskColumnEntity $taskColumnEntity
     * @return array<string,mixed>
     */
    private function updateTaskColumnEntityToArray(TaskColumnEntity $taskColumnEntity)
    {
        return [
            'task_column_id' => $taskColumnEntity->getTaskColumnId()?->getValue(),
            'title' => $taskColumnEntity->getTitle(),
            'user_id' => $taskColumnEntity->getUserId(),
            'sort' => $taskColumnEntity->getSort(),
        ];
    }
}
