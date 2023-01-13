<?php

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
use App\Http\Controllers\AgendaController;

Route::get('/',[AgendaController::class, 'index']);
Route::get('/contacts/create', [AgendaController::class, 'create']);//só usuário logado
Route::post('/contacts', [AgendaController::class, 'store']);
Route::get('/contacts/{id}', [AgendaController::class, 'show']);
Route::get('/contacts/edit/{id}',[AgendaController::class, 'edit']);
Route::put('/contacts/update/{id}',[AgendaController::class, 'update']);
Route::delete('/contacts/{id}',[AgendaController::class, 'destroy'])->middleware('auth');


 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
