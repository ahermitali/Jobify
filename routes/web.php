<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/get-cities/{country}', function ($country) {
//     $response = Http::post("https://countriesnow.space/api/v0.1/countries/cities", [
//         "country" => $country
//     ]);

//     if ($response->successful()) {
//         return response()->json($response->json()['data']);
//     }

//     return response()->json(['error' => 'Unable to fetch cities'], 500);
// })->name('get.cities');

Route::get('/dashboard', function () {
    //return view('dashboard');
    return view('admin.layouts.master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     // Other admin routes...
// });



Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::post('/media', [MediaController::class, 'store'])->name('media.store');
Route::post('/media/load', [MediaController::class, 'load'])->name('media.load');

// Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
// Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
// Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
// Route::post('/update-menu-order', [MenuController::class, 'updateOrder'])->name('menu.update.order');
// Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
// Route::post('/menus/order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');
// Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
// Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::post('/menus/{menuId}/items', [MenuController::class, 'addItem']);
Route::put('/menus/update', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
//Route::delete('/menus/items/{id}', [MenuController::class, 'destroy']);

Route::post('/menu/store', [MenuController::class, 'store']);
Route::get('/menu/{menuId}', [MenuController::class, 'getMenu']);
Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');

Route::get('/menus', [MenuController::class, 'index']);
Route::post('/menus', [MenuController::class, 'store']);
Route::post('/menus/{menuId}/items', [MenuController::class, 'addItem']);
Route::put('/menus/update', [MenuController::class, 'update']);
Route::delete('/menus/items/{id}', [MenuController::class, 'destroy']);

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs/store',[JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/index', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/jobs/update/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/destroy/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::get('/qualification/create', [QualificationController::class, 'create'])->name('qualification.create');
Route::post('/qualification/store',[QualificationController::class, 'store'])->name('qualification.store');
Route::get('/qualification/index', [QualificationController::class, 'index'])->name('qualification.index');
Route::get('/qualification/edit/{id}', [QualificationController::class, 'edit'])->name('qualification.edit');
Route::put('/qualification/update/{id}', [QualificationController::class, 'update'])->name('qualification.update');
Route::delete('/qualification/destroy/{id}', [QualificationController::class, 'destroy'])->name('qualification.destroy');

Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
Route::post('/page/store',[PageController::class, 'store'])->name('page.store');
Route::get('/page/index', [PageController::class, 'index'])->name('page.index');
Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
Route::put('/page/update/{page}', [PageController::class, 'update'])->name('page.update');
Route::delete('/page/destroy/{id}', [PageController::class, 'destroy'])->name('page.destroy');


Route::get('/', function () {
    return view('frontend.home'); // This loads resources/views/layouts/master.blade.php
});
require __DIR__.'/auth.php';
