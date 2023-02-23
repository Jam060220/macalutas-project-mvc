<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationsController;


Route::get('/', [ReservationsController::class, 'create']);

Route::resource('reservations', ReservationsController::class);