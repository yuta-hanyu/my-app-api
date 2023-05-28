<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\TaskColumn;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractorInterface;
use Illuminate\Support\Facades\Log;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetRequest;
// use Packages\UseCase\API\TaskColumn\Get\TaskGetColumnResponse;
use Throwable;

class TaskColumnController extends Controller
{
    public function getTasks(
        Request $request,
        TaskColumnGetInteractorInterface $interactor
    ): JsonResponse {
    Log::debug("あああああああああああああ");
        $request = new TaskColumnGetRequest('羽生');
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
}
