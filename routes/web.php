<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::middleware('isGuest')->group(function () {
    Route::get(
        '/',
        [TodoController::class, 'index']
    )->name('login');
    Route::get(
        '/register',
        [TodoController::class, 'regis']
    )->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});


Route::get(
    '/logout',
    [TodoController::class, 'logout']
)->name('logout');

Route::middleware('isLogin')->group(function () {
    Route::get(
        '/dashboard',
        [TodoController::class, 'dashboard']
    )->name('dashboard');
    Route::get(
        '/create',
        [TodoController::class, 'create']
    )->name('create');
    Route::post(('/store'), [TodoController::class, 'store'])->name('store');
    Route::get(
        '/data',
        [TodoController::class, 'data']
    )->name('data');
    // path yg ada {} artinya path dinamis, path dinamis merupakan oath yang datanya di isi dari database. path dinamis ini nantinya akan berubah - ubah tergantung data yang di berikan. apabila dalam routenya ada path dinamis maka nantinya path dinamis ini dapat di akses oleh controller melalui parameter di function nya 
    // dalam satu route boleh lebih dari satu path dinamis 
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    // method route buat update data ke database itu pake patch/put
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    // method route buat delae data ke database itu pake delate
    Route::delete('/destroy/{id}', [TodoController::class, 'destroy'])->name('destroy');
    Route::patch('/complated/{id}', [TodoController::class, 'updateToComplated'])->name('update-complated');
});
