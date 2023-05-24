<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Task;

// use App\Http\Common\Auth\UserInfo;
// use App\Http\Common\Errors\API\ErrorMessage;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Announcement\CreateAnnouncementRequest;
// use App\Http\Requests\Announcement\UpdateAnnouncementRequest;
// use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
// use Packages\Domain\Announcement\AnnouncementId;
// use Packages\Domain\Exception\Validate\UserRoleValidateException;
// use Packages\UseCase\API\Announcement\Create\AnnouncementCreateInteractorInterface;
// use Packages\UseCase\API\Announcement\Create\AnnouncementCreateRequest;
// use Packages\UseCase\API\Announcement\Delete\AnnouncementDeleteInteractorInterface;
// use Packages\UseCase\API\Announcement\Delete\AnnouncementDeleteRequest;
// use Packages\UseCase\API\Announcement\Get\AnnouncementGetInteractorInterface;
// use Packages\UseCase\API\Announcement\Get\AnnouncementGetRequest;
// use Packages\UseCase\API\Announcement\Update\AnnouncementUpdateInteractorInterface;
// use Packages\UseCase\API\Announcement\Update\AnnouncementUpdateRequest;
use Illuminate\Support\Facades\Log;
use Throwable;

class TaskController extends Controller
{
    public function getTasks(
        Request $request,
        // AnnouncementGetInteractorInterface $interactor
    ): JsonResponse {
        Log::debug("あああああああああああああ");
        return response()->json(
            [
                'Good morning' => 'おはよう',
                'Hello' => 'こんにちは',
            ]
        );
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

    /**
     * @param AnnouncementCreateInteractorInterface $interactor
     * @param CreateAnnouncementRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    // public function createAnnouncement(
    //     AnnouncementCreateInteractorInterface $interactor,
    //     CreateAnnouncementRequest $request
    // ): JsonResponse {
    //     try {
    //         $organizationId = UserInfo::getOrganizationId($request);
    //         if (!$organizationId) {
    //             return ErrorMessage::apiError('AnnouncementControllerPostPostRecommendUsersNonOrganizationId');
    //         }
    //         $userName = UserInfo::getAuth0UserId($request);
    //         if (!$userName) {
    //             return ErrorMessage::apiError('AnnouncementControllerPostPostRecommendUsersNonUserName');
    //         }

    //         $request = new AnnouncementCreateRequest(
    //             $organizationId,
    //             $request->input('title'),
    //             $request->input('description'),
    //             $request->input('start_datetime'),
    //             $request->input('end_datetime'),
    //             $userName
    //         );
    //         return $interactor->handle($request);
    //     } catch (UserRoleValidateException $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerPostPostRecommendUsersValidateUserRole', $e);
    //     } catch (Throwable $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerPostPostRecommendUsersException', $e);
    //     }
    // }

    /**
     * @param int $announcementId
     * @param AnnouncementUpdateInteractorInterface $interactor
     * @param UpdateAnnouncementRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    // public function updateAnnouncement(
    //     int $announcementId,
    //     AnnouncementUpdateInteractorInterface $interactor,
    //     UpdateAnnouncementRequest $request
    // ): JsonResponse {
    //     try {
    //         $organizationId = UserInfo::getOrganizationId($request);
    //         if (!$organizationId) {
    //             return ErrorMessage::apiError('AnnouncementControllerPutPutRecommendUsersNonOrganizationId');
    //         }
    //         $userName = UserInfo::getAuth0UserId($request);
    //         if (!$userName) {
    //             return ErrorMessage::apiError('AnnouncementControllerPutPutRecommendUsersNonUserName');
    //         }

    //         $request = new AnnouncementUpdateRequest(
    //             new AnnouncementId($announcementId),
    //             $organizationId,
    //             $request->input('title'),
    //             $request->input('description'),
    //             $request->input('start_datetime'),
    //             $request->input('end_datetime'),
    //             $userName
    //         );
    //         return $interactor->handle($request);
    //     } catch (UserRoleValidateException $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerPutPutRecommendUsersValidateUserRole', $e);
    //     } catch (Throwable $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerPutPutRecommendUsersException', $e);
    //     }
    // }

    /**
     * @param int $announcementId
     * @param AnnouncementDeleteInteractorInterface $interactor
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    // public function deleteAnnouncement(
    //     int $announcementId,
    //     AnnouncementDeleteInteractorInterface $interactor,
    //     Request $request
    // ): JsonResponse {
    //     try {
    //         $organizationId = UserInfo::getOrganizationId($request);
    //         if (!$organizationId) {
    //             return ErrorMessage::apiError('AnnouncementControllerDeleteDeleteRecommendUsersNonOrganizationId');
    //         }
    //         $userName = UserInfo::getAuth0UserId($request);
    //         if (!$userName) {
    //             return ErrorMessage::apiError('AnnouncementControllerDeleteDeleteRecommendUsersNonUserName');
    //         }
    //         $request = new AnnouncementDeleteRequest($organizationId, new AnnouncementId($announcementId), $userName);
    //         return $interactor->handle($request);
    //     } catch (UserRoleValidateException $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerDeleteDeleteRecommendUsersValidateUserRole', $e);
    //     } catch (Throwable $e) {
    //         return ErrorMessage::apiError('AnnouncementControllerDeleteDeleteRecommendUsersException', $e);
    //     }
    // }
}
