<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UnitController;
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
    // Route::get('/walls', [WallController::class, 'getAll']);
    // Route::post('/wall/{id}/like', [walllikes::class, 'like']);

    // //Documentos
    // Route::get('/docs', [DocController::class, 'getAll']);

    //Livro de ocorrências
    // Route::get('/warnings', [WarningController::class, 'getWarnings']);
    // Route::post('/warning', [WarningController::class, 'setWarning']);
    // Route::post('/warning/file', [WarningController::class, 'addWarningFile']);

    //Boletos
    // Route::get('/billets', [BilletController::class, 'getAll']);

    //Unidade ler moradores/ veiculos
    Route::get('/unit/{id}', [UnitController::class, 'getInfo']);
    Route::post('/unit/{id}/addperson', [UnitController::class, 'addPerson']);
    Route::post('/unit/{id}/addvehicle', [UnitController::class, 'addVehicle']);
    Route::post('/unit/{id}/removeperson', [UnitController::class, 'removeperson']);
    Route::post('/unit/{id}/removevehicle', [UnitController::class, 'removevehicle']);

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
