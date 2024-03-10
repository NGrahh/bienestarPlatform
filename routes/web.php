<?php

use App\Http\Controllers\PasswordController;
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
Route::post('form-appointment', [UserController::class, 'form-appointment'])->name('formularios.form-appointment');


Route::get('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasena'])->name('pass.recuperarcontrasena');
Route::post('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasenasolicitud'])->name('pass.recuperarcontrasenasolicitud');
Route::get('/cambiar-contrasena', [PasswordController::class, 'cambiarcontrasena'])->name('pass.cambiarcontrasena');
Route::post('/cambiar-contrasena', [PasswordController::class, 'restablecercontrasena'])->name('pass.restablecercontrasena');




Route::get('/index', function () {
    return view('auth/index');
})->name('index'); 

// Ruta Formulario para agendar cita
Route::get('/form-appointment', function () {
    return view('formularios/form-appointment');
});

// rutas Emails
Route::get('/creacion-cuenta', function () {
    return view('emails/creacion-cuenta');
}); 

//Ruta Email restablecer contraseña
Route::get('/solicitud-restablecer-password', function () {
    return view('emails/solicitud-restablecer-password');
}); 