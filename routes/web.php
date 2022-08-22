<?php

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JadwalController;

use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DashboardMatkulController;
use App\Http\Controllers\StrukturKurikulumController;

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

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboardmatkul',[DashboardMatkulController::class, 'index'])->middleware('auth');
Route::get('/manajemen_matkul', function () {
    return view('admin.manajemen_mata_kuliah.index');
})->middleware('auth');

Route::get('/show/{id}',[FacultyController::class,'showupdate'])->middleware('auth');
Route::get('/facultyupdate/{id}',[FacultyController::class,'facultyupdate'])->middleware('auth');

Route::middleware('auth')->group(function () {
Route::get('prodi/export/',[ProdiController::class,'ExportProdis']);
Route::post('prodi/import/',[ProdiController::class,'ImportProdis'])->name('ImportProdis');
Route::get('matkuls/export/',[MatkulController::class,'exportMatkuls']);
Route::post('matkuls/import/',[MatkulController::class,'importMatkuls'])->name('ImportMatkuls'); 
Route::get('/filterByFaculty/id',[ProdiController::class,'filterByFaculty']);


Route::resources([
    'faculties'=> FacultyController::class,
    'prodi'=> ProdiController::class,
    'matkul'=> MatkulController::class,
    'metode'=> MetodeController::class,
    'strukturkurikulum'=>StrukturKurikulumController::class
]);
});
Route::get('/createkurikulum/{prodi_id}/{masterkurikulum_id}',[StrukturKurikulumController::class,'createkurikulum'])->name('createkurikulum');
Route::get('/showkurikulum/{prodi_id}/{masterkurikulum_id}',[StrukturKurikulumController::class,'showkurikulum'])->name('showkurikulum');
// Route::resource('faculties', FacultyController::class); 
// Route::resource('prodi', ProdiController::class);
// Route::resource('matkul', MatkulController::class);
// Route::resource('metode', MetodeController::class);
//jadwal
Route::resource('jadwal', JadwalController::class)->middleware('auth');



// Routing for asset   

// Route::post('/import', function(){
//     Excel::import(new UsersImport, request()->file('file'));
//     return back();
// });

Route::middleware('auth')->group(function () {
    Route::get('/showRoom/id_ruangan',[AssetController::class,'showRoom'])->name('showRoom');
    Route::get('/cetak_laporan/id_ruangan',[AssetController::class,'cetak_laporan'])->name('cetak_laporan');
    Route::post('/assetsImport',[AssetController::class,'assetsImport'])->name('assetsImport'); 
    Route::get('/assetsExport',[AssetController::class,'assetsExport'])->name('assetsExport'); 
    Route::resource('asset',AssetController::class);
});

