<?php

use App\Http\Controllers\PictureController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::resource("tasks", TaskController::class);
Route::get('tasks/{id}/deleteUser/{userId}',[TaskController::class,"deleteUser"])->name('tasks.deleteUser');

Route::get('/users/index',[UserController::class,'index'])->name('users.index');

Route::get('/pictures/{id}/addPicture',[PictureController::class,'addPicture'])->name('pictures.addPicture');
Route::resource("pictures", PictureController::class)->except(['store']);
Route::post('/pictures/{id}/store', [PictureController::class, 'store'])->name('pictures.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
