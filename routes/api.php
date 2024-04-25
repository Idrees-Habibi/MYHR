<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\GeneralController;
use Illuminate\Support\Facades\Route;

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

Route::post('chat-initialization', [ChatController::class, 'chatInitialization'])->name('create-chat');
Route::middleware('auth:sanctum')->prefix('chat')->group(function () {
    Route::post('/send-message', [ChatController::class, 'chatMessage'])->name('chat.send-message');
    Route::post('/file-upload', [FileController::class, 'fileUpload'])->name('chat.file-upload');
    Route::post('/file-delete', [FileController::class, 'fileDelete'])->name('chat.file-delete');
    Route::get('/file-download', [FileController::class, 'downloadFile'])->name('chat.file-download');
    Route::post('/review', [ChatController::class, 'chatReview'])->name('chat.review');
    Route::post('/get-messages', [ChatController::class, 'getChatMessages'])->name('chat.get-messages');
});
Route::get('/topics', [GeneralController::class, 'allTopics'])->name('topics');
