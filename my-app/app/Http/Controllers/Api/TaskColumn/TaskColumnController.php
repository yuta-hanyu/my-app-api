<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\TaskColumn;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskColumn\UpdateTaskColumnRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractorInterface;
use Illuminate\Support\Facades\Log;
use Packages\Domain\TaskColumn\TaskColumnId;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetRequest;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateInteractorInterface;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateRequest;
use Throwable;

class TaskColumnController extends Controller
{
    public function getTasks(
        Request $request,
        TaskColumnGetInteractorInterface $interactor
    ): JsonResponse {
        $request = new TaskColumnGetRequest('羽生', 1);
        return $interactor->handle($request);
        // try {
        //     $organizationId = UserInfo::getOrganizationId($request);
        //     if (!$organizationId) {
        //         return ErrorMessage::apiError('AnnouncementControllerGetGetRecommendUsersNonOrganizationId');
        //     }
        //     $userName = UserInfo::getAuth0UserId($request);
        //     if (!$userName) {
        //         return ErrorMessage::apiError('AnnouncementControllerGetGetRecommendUsersNonUserName');
        //     }

        //     $request = new AnnouncementGetRequest($organizationId, $userName);
        //     return $interactor->handle($request);
        // } catch (UserRoleValidateException $e) {
        //     return ErrorMessage::apiError('AnnouncementControllerGetGetRecommendUsersValidateUserRole', $e);
        // } catch (Throwable $e) {
        //     return ErrorMessage::apiError('AnnouncementControllerGetGetRecommendUsersException', $e);
        // }
    }

    public function updateTaskColumnSort(
        UpdateTaskColumnRequest $request,
        TaskColumnUpdateInteractorInterface $interactor
    ): JsonResponse {
        $taskColumnList = [];
        foreach ($request->input('columns') as $taskColumn) {
            $taskColumnList[] = new TaskColumnUpdateRequest(
                '羽生',
                $taskColumn['user_id'],
                new TaskColumnId($taskColumn['task_column_id']),
                $taskColumn['title'],
                $taskColumn['sort']
            );
        }
        return $interactor->handle($taskColumnList);
    }
}
