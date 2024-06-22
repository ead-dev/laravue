<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EtudiantController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

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

/* Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');
 */
//Auth::routes();

Route::middleware(['auth','agent'])
    ->prefix('agent')
   ->group(function(){
   // Route::get('/users',[UserController::class,'index']);
    Route::get('/etudiants',[EtudiantController::class,'index']);
});

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/etudiants',[EtudiantController::class,'index']);
        Route::get('/etudiants/create',[EtudiantController::class,'create']);
        Route::post('/etudiants',[EtudiantController::class,'store']);

        Route::get('/users',[UserController::class,'index']);
        Route::get('/users/create',[UserController::class,'create']);
        Route::post('/users',[UserController::class,'store']);
    });


Route::prefix('enseignant')
    ->middleware(['auth','enseignant'])
    ->group(function(){
        Route::get('/etudiants',[EtudiantController::class,'index']);
        Route::get('/etudiants/create',[EtudiantController::class,'create']);
        Route::post('/etudiants',[EtudiantController::class,'store']);


    });



Route::middleware(['auth'])
   // ->prefix('admin')
   ->group(function(){
   // Route::get('/users',[UserController::class,'index']);//->middleware('active');
   // Route::post('/users',[UserController::class,'store']);
    Route::get('/users/create',[UserController::class,'create']);
    Route::get('/etudiants',[EtudiantController::class,'index']);
    Route::get('/users/disable/{id}',[UserController::class,'disable'])->name('users.disable');
    Route::get('/users/enable/{id}',[UserController::class,'enable'])->name('users.enable');

});





Route::get('/agents',[App\Http\Controllers\HomeController::class, 'getItems']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']); //->middleware('active');
