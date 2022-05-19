<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\FacultyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/show/{id}',[FacultyController::class,'showupdate']);
Route::get('/facultyupdate/{id}',[FacultyController::class,'facultyupdate']);
Route::resource('faculties', FacultyController::class); 
Route::resource('prodi', ProdiController::class);
Route::resource('matkul', MatkulController::class);
