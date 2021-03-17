<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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
    return view('welcome');
});


// Route::get('/testapi', [OrderController::class, 'index']);
Route::get('api', [OrderController::class, 'index']);
Route::get('notification', [OrderController::class, 'notification']);
Route::get('show', function(){
    return view('show');
});
