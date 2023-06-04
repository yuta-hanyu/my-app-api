<?php

declare(strict_types=1);

namespace App\Http\Requests\TaskColumn;

use App\Http\Requests\BaseRequest\BaseRequestJson;

class UpdateTaskColumnRequest extends BaseRequestJson
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
        return [
            'columns' => 'required',
            'columns.*.task_column_id' => 'required|integer',
            'columns.*.title' => 'required|string|max:255',
            'columns.*.sort' => 'required|integer',
        ];
    }
}
