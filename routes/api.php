<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
});

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::post('/', [EventController::class, 'store']);
    Route::get('/{eventId}/users', [EventController::class, 'getEventUsers']);
});

Route::prefix('invitations')->group(function () {
    Route::post('/invite', [InvitationController::class, 'inviteUser']);
    Route::patch('/{invitation}/status', [InvitationController::class, 'updateStatus']);
    Route::patch('/{invitation}/attendance', [InvitationController::class, 'markAttendance']);
});
