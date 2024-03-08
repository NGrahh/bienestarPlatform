<?php

use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('/block', function () {
    return view('welcome');
})->name('block')->middleware('auth');


Route::get('/login', function () {
    return view('auth/login');
})->name('login');//ALIAS

Route::resource('auth', UserController::class);
Route::post('login', [UserController::class, 'login'])->name('auth.login');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::get('register', [UserController::class, 'register'])->name('auth.registerform');




// Route::get('/forms', function () {
//     return view('auth/forms');
// })->name('forms'); 
Route::get('/index', function () {
    return view('auth/index');
})->name('index'); 

Route::get('/forms-eventos', function () {
    return view('auth/forms-eventos');
})->name('forms-eventos'); 




// rutasemails
Route::get('/creacioncuenta', function () {
    return view('emails/creacioncuenta');
}); 