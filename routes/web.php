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


//RUTA INDEX

Route::get('/index', function () {
    return view('auth/index');
})->name('index'); 



Route::resource('auth', UserController::class);

//RUTA LOG IN (Iniciar Sesión)
Route::post('login', [UserController::class, 'login'])->name('auth.login');
Route::get('/login', function () {
    return view('auth/login');
})->name('login');//-> "Alias"


//RUTA LOG OUT (Cerrar Sesión)
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');

//RUTA REGISTER (Registrarse)
Route::get('register', [UserController::class, 'register'])->name('auth.registerform');



// RUTA PARA RECUPERAR CONTRASEÑA
Route::get('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasena'])->name('pass.recuperarcontrasena');
Route::post('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasenasolicitud'])->name('pass.recuperarcontrasenasolicitud');

// RUTA PARA CAMBIAR CONTRASEÑA
Route::get('/cambiar-contrasena', [PasswordController::class, 'cambiarcontrasena'])->name('pass.cambiarcontrasena');
Route::post('/cambiar-contrasena', [PasswordController::class, 'restablecercontrasena'])->name('pass.restablecercontrasena');


//RUTAS ENVÍO EMAILS.

//Ruta envió Email para la CREACIÓN DE CUENTA.
Route::get('/creacion-cuenta', function () {
    return view('emails/creacion-cuenta');
}); 

//Ruta envió Email para RESTABLECER CONTRASEÑA.
Route::get('/solicitud-restablecer-password', function () {
    return view('emails/solicitud-restablecer-password');
}); 

//Ruta FOrmulario crear evento.
Route::get('/form-create-event', function () {
    return view('formularios/form-create-event');
}); 

//Ruta FOrmulario inscribirse a evento.
Route::get('/form-inscription-event', function () {
    return view('formularios/form-inscription-event');
}); 

//Ruta FOrmulario inscribirse a apoyo.
Route::get('/form-inscription-supports', function () {
    return view('formularios/form-inscription-supports');
}); 



//RUTAS FORMULARIOS

// Ruta Formulario para AGENDAR CITA
Route::get('form-appointment', [UserController::class, 'mostrarVista'])->name('mostrarVista');
Route::post('form-appointment', [UserController::class, 'form-appointment'])->name('formularios.form-appointment');

// Ruta Formulario para CREACION EVENTO
Route::get('form-create-event', [UserController::class, 'form-create-event'])->name('formularios.form-create-event');

// Ruta Formulario para INSCRIPCION A EVENTO
Route::get('form-inscription-event', [UserController::class, 'form-inscription-event'])->name('formularios.form-inscription-event');

// Ruta Formulario para INSCRIPCION A LOS APOYOS
// Ruta Formulario para INSCRIPCION A Apoyo
Route::get('form-inscription-supports', [UserController::class, 'form-inscription-supports'])->name('formularios.form-inscription-supports');

// RUTAS CRUD
// Route::get('user_list', [UserController::class, 'user_list'])->name('formularios.form-inscription-supports');
Route::get('/user_list', function () {
    return view('crud/user_list');
}); 
