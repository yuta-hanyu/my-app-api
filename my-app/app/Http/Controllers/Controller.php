<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;

// class Controller extends BaseController
// {
//     use AuthorizesRequests, ValidatesRequests;
// }

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function __construct()
    {
    }

    /**
     * @param array<mixed> $result
     * @return JsonResponse
     */
    public function getSuccessResponse(array $result = []): JsonResponse
    {
        return response()->json($result, 200);
    }
}