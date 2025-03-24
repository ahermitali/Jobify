<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;

Route::get('/get-cities/{country}', [LocationController::class, 'getCities'])->name('get.cities');
Route::get('/get-countries', [LocationController::class, 'getCountries'])->name('get.countries');