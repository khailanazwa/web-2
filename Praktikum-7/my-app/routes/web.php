<?php

use App\http\Controllers;
use App\Http\Controllers\UnitkerjaController;

Route::get('/213', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return 'Belajar Laravel 12 di STTNF 2025';
});

Route::get("/unit-kerja", [UnitkerjaController::class, "index"]);