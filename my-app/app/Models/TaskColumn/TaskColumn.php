<?php

declare(strict_types=1);

namespace App\Models\TaskColumn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskColumnEntity
 * @property int $task_column_id
 * @property int $user_id
 * @property string $title
 * @property int $sort
 */
class TaskColumn extends Model
{
    use HasFactory;

    protected $table = 'task_columns';
    protected $primaryKey = 'task_column_id';

    protected $fillable = [
        'task_column_id',
        'user_id',
        'title',
        'sort'
    ];
}
