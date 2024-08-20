<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;



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
    return view('welcome');
});
Route::get('/mostradado',[ExampleController::class,'MostrarDados']);
Route::post('/recebe_dados', [ExampleController::class,'RecebeDados']);

Route::get('/list_users', [ExampleController::class, 'listUsers']);
Route::post('/delete_user', [ExampleController::class, 'deleteUser']);