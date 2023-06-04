<?php

declare(strict_types=1);

namespace App\Http\Requests\BaseRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use function response;

class BaseRequestJson extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->toArray(), 400));
    }
}
