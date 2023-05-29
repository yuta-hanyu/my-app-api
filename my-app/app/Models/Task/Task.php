<?php

declare(strict_types=1);

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskEntity
 * @property int $task_id
 * @property int $user_id
 * @property int $task_column_id
 * @property string $title
 * @property int $sort
 */
class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id',
        'user_id',
        'task_column_id',
        'title',
        'sort'
    ];
}
