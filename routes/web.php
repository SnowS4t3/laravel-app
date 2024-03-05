<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('contact/thanks', [ContactController::class, 'send'])->name('contact.send');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::middleware('auth')->group(function () {
    Route::get('admin/list', [ContactController::class, 'list'])->name('admin.list');
    Route::get('/admin/{id}', [ContactController::class, 'detail'])->whereNumber('id')->name('admin.detail');
    Route::post('/update-contact/{id}', 'App\Http\Controllers\ContactController@update')->name('update_contact');

    Route::delete('admin/destroy/{id}', [ContactController::class, 'destroy'])->name('admin.destroy');
});
