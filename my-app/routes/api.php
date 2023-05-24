<?php

// NOTE https://qiita.com/Hiraku/items/734f0666ab3d34c52efa
// declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Task\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks', 'getTasks');
    // Route::post('/announcements', 'createAnnouncement');
    // Route::put('/announcements/{announceId}', 'updateAnnouncement');
    // Route::delete('/announcements/{announceId}', 'deleteAnnouncement');
});

