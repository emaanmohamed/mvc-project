<?php

use SecTheater\Http\Route;

Route::get('/home', [\App\Controllers\HomeController::class, 'index']);