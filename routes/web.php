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

Route::middleware('auth')
   ->group(function(){
    Route::get('/users',[UserController::class,'index']);
    Route::post('/users',[UserController::class,'store']);
    Route::get('/users/create',[UserController::class,'create']);
    Route::get('/etudiants',[EtudiantController::class,'index']);
});



Route::get('/agents',[App\Http\Controllers\HomeController::class, 'getItems']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
