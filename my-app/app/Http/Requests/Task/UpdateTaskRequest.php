<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Http\Requests\BaseRequest\BaseRequestJson;

class UpdateTaskRequest extends BaseRequestJson
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'tasks' => 'required',
            'tasks.*.task_id' => 'required|integer',
            'tasks.*.task_column_id' => 'required|integer',
            'tasks.*.title' => 'required|string|max:255',
            'tasks.*.sort' => 'required|integer',
        ];
    }
}
