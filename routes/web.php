<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//login or not
Route::group([
    'middleware' => 'admin'
], function () {
    Route::get('/pizza', [App\Http\Controllers\PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [App\Http\Controllers\PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/store', [App\Http\Controllers\PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/edit/{id}', [App\Http\Controllers\PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/update/{id}', [App\Http\Controllers\PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/delete/{id}', [App\Http\Controllers\PizzaController::class, 'destroy'])->name('pizza.destroy');
    //user order
    Route::get('/pizza/order', [App\Http\Controllers\UserOrderController::class, 'index'])->name('pizza.order');
    Route::post('/pizza/status/{id}', [App\Http\Controllers\UserOrderController::class, 'changeStatus'])->name('order.status');
});

