<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

	

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('contact/thanks', [ContactController::class, 'send'])->name('contact.send');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('contact/list', [ContactController::class, 'list'])->name('contact.list');
Route::get('/contact/{id}', [ContactController::class, 'detail'])->whereNumber('id')->name('contact.detail');
// 本の削除
Route::post('contact/destroy{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
