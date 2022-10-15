<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WallController;
use App\Http\Controllers\WarningController;
use App\Models\walllikes;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return ['pong', true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('/auth/validate', [AuthController::class, 'validateToken']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    //mural de avisos
    Route::get('/walls', [WallController::class, 'getAll']);
    Route::post('/wall/{id}/like', [walllikes::class, 'like']);

    //Documentos
    Route::get('/docs', [DocController::class, 'getAll']);

    //Livro de ocorrências
    Route::get('/warnings', [WarningController::class, 'getWarnings']);
    Route::post('/warning', [WarningController::class, 'setWarning']);
    Route::post('/warning/file', [WarningController::class, 'addWarningFile']);

    //Boletos
    Route::get('/billets', [BilletController::class, 'getAll']);

    //Unidade ler moradores/ veiculos
    Route::get('/unit/{id}', [UnitController::class, 'getInfo']);
    Route::post('/unit{id}/removeVeiuclo', [UnitController::class, 'removeVeiuclo']);
    Route::post('/unit{id}/removeVeiuclo', [UnitController::class, 'addVeiculo']);

    //Remove

    Route::post('/unit{id}/removePerson', [UnitController::class, 'removePerson']);
    Route::post('/unit{id}/removeVeiuclo', [UnitController::class, 'removeVeiculo']);

    //Reservas

    Route::get('/reservations', [ReservationController::class, 'getReservation']);
    //Add reserva
    Route::post('/myreservations{id}', [ReservationController::class, 'setMyReservation']);

    Route::get('/reservation/{id}/disableddates', [ReservationController::class, 'getDisableDates']);
    Route::get('/reservation/{id}/times', [ReservationController::class, 'getTimes']);
    //Deleta uma reserva que eu já fiz
    Route::get('/myreservation', [ReservationController::class, 'getMyReservation']);
    Route::delete('/myreservation/{id}', [ReservationController::class, 'delReservation']);

});
