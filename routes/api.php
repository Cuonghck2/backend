<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\AwardGradeController;
use App\Http\Controllers\AwardLevelController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TypeResultController;
use App\Http\Controllers\TopicLeaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

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
//auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [AuthController::class, 'me']);
    Route::put('/users/{idUser}', [UserController::class, 'update']);
    Route::delete('/users/{idUser}', [UserController::class, 'destroy']);
});



//units
Route::get('/units', [UnitController::class, 'index']);
//awardGrade
Route::get('/awardGrade', [AwardGradeController::class, 'index']);
//awardLevel
Route::get('/awardLevel', [AwardLevelController::class, 'index']);


//categories
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::put('/categories/{idCategory}', [CategoriesController::class, 'update']);
Route::delete('/categories/{idCategory}', [CategoriesController::class, 'destroy']);

//topicLeader
Route::get('/topicLeader', [TopicLeaderController::class, 'index']);
Route::post('/topicLeader', [TopicLeaderController::class, 'store']);
Route::put('/topicLeader/{idLeader}', [TopicLeaderController::class, 'update']);
Route::delete('/topicLeader/{idLeader}', [TopicLeaderController::class, 'destroy']);
//members
Route::get('/members/{idLeader}', [MembersController::class, 'getMembersByLeader']);
Route::post('/members', [MembersController::class, 'store']);
Route::put('/members/{idMember}', [MembersController::class, 'update']);
Route::delete('/members/{idMember}', [MembersController::class, 'destroy']);



//topics
Route::get('/topics', [TopicsController::class, 'index']);
Route::post('/topics', [TopicsController::class, 'store']);
Route::put('/topics/{idTopic}', [TopicsController::class, 'update']);
Route::delete('/topics/{idTopic}', [TopicsController::class, 'destroy']);

//file
Route::get('/document/{idTopic}', [\App\Http\Controllers\DocumentController::class, 'getDocumentByTopic']);
Route::get('/document/download/{id}', [\App\Http\Controllers\DocumentController::class, 'download']);
Route::post('/document', [\App\Http\Controllers\DocumentController::class, 'upload']);
Route::delete('/document/delete/{id}', [\App\Http\Controllers\DocumentController::class, 'destroy']);
//awards
Route::get('/awards', [AwardsController::class, 'index']);
Route::get('/awardGrade', [AwardGradeController::class, 'index']);
Route::get('/awardLevel', [AwardLevelController::class, 'index']);

//type result
Route::get('/result', [TypeResultController::class, 'index']);