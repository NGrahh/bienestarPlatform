<?php

use App\Http\Controllers\EventsController;
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
    return view('compartido/home');
})->name('home');

Route::get('/home', function () {
    return view('compartido/home');
})->name('home');

Route::get('/block', function () {
    return view('welcome');
})->name('block')->middleware('auth');


//RUTA INDEX

Route::get('/index', function () {
    return view('index');
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

Route::resource('eventos', EventsController::class)->middleware('auth');





//RUTAS FORMULARIOS

// Ruta Formulario para AGENDAR CITA
Route::get('form-appointment', [EventsController::class, 'showDimensions'])->name('showDimensions');
Route::post('form-appointment', [EventsController::class, 'form-appointment'])->name('formularios.form-appointment');

// Ruta Formulario para CREACION EVENTO
// Route::get('/form-create-event', [UserController::class, 'form-create-event'])->name('form-create-event');
// Route::post('/form-create-event', [UserController::class, 'form-create-event'])->name('formularios.form-create-event');
Route::get('/creacion-eventos', function () {
    return view('formularios/eventos/form-create-event');
})->name('forms.create-events');

Route::get('/listado-eventos', function (){
})->name('forms.list-events'); 

// Ruta Formulario para INSCRIPCION A EVENTO
Route::get('form-inscription-event', [EventsController::class, 'showStudyTime'])->name('showStudyTime');
Route::post('form-inscription-event', [EventsController::class, 'form-inscription-event'])->name('formularios.eventos.form-inscription-event');


// Ruta Formulario para INSCRIPCION A LOS APOYOS


Route::get('form-inscription-supports', [EventsController::class, 'inscrip'])->name('inscrip');
Route::post('form-inscription-supports', [EventsController::class, 'form-inscription-supports'])->name('formularios.apoyos.form-inscription-supports');


// //Ruta Formulario INSCRIBIRSE A UN APOYO
// Route::get('/form-inscription-supports', function () {
//     return view('formularios.apoyos.form-inscription-supports');
// }); 


// RUTAS CRUD
// Route::get('user_list', [UserController::class, 'user_list'])->name('formularios.form-inscription-supports');
Route::get('/user_list', function () {
    return view('crud/user_list');
}); 



Route::get('/menu', function () {
    return view('layouts/menu');
})->name('menu'); 

//Rutas Descipciones Apoyos

Route::get('/Servicio-deportes', function(){
    return view('layouts.Descripcion.Servicio-deportes');
})->name('Servicio'); 

Route::get('/Servicio-enfermeria', function(){
    return view ('layouts.Descripcion.Servicio-enfermeria');
})-> name ('Servicio');

Route::get('/Servicio-Musica', function(){
    return view ('layouts.Descripcion.Servicio-Musica');
})-> name ('Servicio');

Route::get('/Servicio-Psicologia', function(){
    return view ('layouts.Descripcion.Servicio-Psicologia');
})-> name ('Servicio');

Route::get('/Servicio-Consejeria', function(){
    return view ('layouts.Descripcion.Servicio-Consejeria');
})-> name ('Servicio');

