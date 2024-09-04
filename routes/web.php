<?php

use App\Http\Controllers\ApoyosController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ApoyosCreatedController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FotosController;

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

Route::get('/store', [imageController::class, 'store'])->name('img.store');




// routes/web.php
Route::get('/apoyos/create', [ApoyosController::class, 'create'])->name('apoyos.create');
Route::post('/apoyos', [ApoyosController::class, 'store'])->name('apoyos.store');


//////// Ruta validaciones para Iniciar, Registrar y Salir del sistema  ////////

// Ingresar al sistema
Route::get('/login', function () {return view('auth/login');})->name('login');
Route::post('login', [UserController::class, 'login'])->name('auth.login');

// Salir del sistema
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Registrar cuenta
Route::get('register', [UserController::class, 'register'])->name('auth.register');

////////////////////////////////////////////////////////////////////////////////

//////// Ruta recuperar y restablecer contraseña  ////////

// Ruta para recuperar contraseña

Route::get('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasena'])->name('pass.recuperarcontrasena');
Route::post('/recuperar-contrasena', [PasswordController::class, 'recuperarcontrasenasolicitud'])->name('pass.recuperarcontrasenasolicitud');

// Ruta para cambiar la contraseña

Route::get('/cambiar-contrasena', [PasswordController::class, 'cambiarcontrasena'])->name('pass.cambiarcontrasena');
Route::post('/cambiar-contrasena', [PasswordController::class, 'restablecercontrasena'])->name('pass.restablecercontrasena');

////////////////////////////////////////////////////////////////////////////////

Route::get('/', [CarouselController::class, 'index'])->name('home');

Route::get('/pagina-principal', [CarouselController::class, 'index'])->name('pagina-principal');

Route::get('pagina-principal/{image}', [CarouselController::class, 'getImages'])->name('carousel.getImages');

Route::post('/upload-image', [CarouselController::class, 'uploadImage'])->name('upload.image');

Route::delete('/images/{id}', [CarouselController::class, 'deleteImage'])->name('images.delete');



Route::get('image/{filename}', [FotosController::class, 'show']);

Route::get('equipo/{filename}', [FotosController::class, 'show_equipo']);

Route::get('Apoyos/{filename}', [FotosController::class, 'show_apoyos']);


// Route::get('/pagina-principal', function () {
//     return view('layouts.inicio-pagina.pagina-principal');
// })->name('pagina-principal');

Route::get('/block', function () {
    return view('welcome');
})->name('block')->middleware('auth');


// Route::get('/', function () {
//     return view('layouts.inicio-pagina.pagina-principal');
// })->name('home');

// Route::get('/Bienvenido', function () {
//     return view('layouts.inicio-pagina.pagina-principal');
// })->name('home');


//RUTA INDEX
Route::get('/index', function () {
    return view('index');
})->name('index'); 

// Route::get('/apoyos-dimen', function () {
//     return view('layouts.dimension-apoyos.apoyos-dimen');
// })->name('apoyos-dimen');

//RUTA PARA OBSERVAR EL INDEX

// Route::get('/index', function () {
//     return view('index');
// })->name('index'); 

















//RUTAS ENVÍO EMAILS.

//Ruta envió Email para la CREACIÓN DE CUENTA.







//RUTAS FORMULARIOS

// Ruta Formulario para AGENDAR CITA
Route::get('/Solicitar-Cita', [EventsController::class, 'showDimensions'])->name('showDimensions');
Route::post('/Solicitar-Cita', [EventsController::class, 'form-appointment'])->name('form-appointment');




// Route::get('/form-appointment', function () {
//     return view('formularios.citas.form-appointment');
// })->name('form-appointment');

// Ruta Formulario para CREACIÓN EVENTO
// Route::get('/form-create-event', [UserController::class, 'form-create-event'])->name('form-create-event');
// Route::post('/form-create-event', [UserController::class, 'form-create-event'])->name('formularios.form-create-event');
Route::get('/creacion-eventos', function () {
    return view('formularios/eventos/form-create-event');
})->name('forms.create-events');

Route::get('/listado-eventos', function (){
})->name('forms.list-events'); 

// Ruta Formulario para INSCRIPCIÓN A EVENTO
// Route::get('form-inscription-event', [EventsController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('form-inscription-event', [EventsController::class, 'form-inscription-event'])->name('formularios.eventos.form-inscription-event');


// Ruta Formulario para INSCRIPCIÓN A LOS APOYOS

// // Ruta para mostrar el formulario de inscripción
// Route::get('/formulario-inscripcion-apoyos', [ApoyosController::class, 'create'])->name('apoyos.create');

// // Ruta para manejar la solicitud POST del formulario de inscripción
// Route::post('/formulario-inscripcion-apoyos', [ApoyosController::class, 'store'])->name('apoyos.store');







Route::get('/menu', function () {
    return view('layouts/menu');
}); 




//Rutas Descripciones Servicios

Route::get('/servicio-deportes', function(){
    return view('layouts.descripcion-servicios.servicio-deportes');
})->name('Servicio-deportes'); 

Route::get('/servicio-enfermeria', function(){
    return view ('layouts.descripcion-servicios.servicio-enfermeria');
})-> name ('Servicio-enfermeria');

Route::get('/servicio-Musica', function(){
    return view ('layouts.descripcion-servicios.servicio-musica');
})-> name ('Servicio-Musica');

Route::get('/servicio-Psicologia', function(){
    return view ('layouts.descripcion-servicios.servicio-psicologia');
})-> name ('Servicio-Psicologia');

Route::get('/servicio-Consejeria', function(){
    return view ('layouts.descripcion-servicios.servicio-Consejeria');
})-> name ('Servicio-Consejeria');




//Rutas Descripcion Apoyos
Route::get('/apoyo-regular', function(){
    return view ('layouts.descripcion-apoyos.Apoyo-regular');
})-> name ('Apoyo-regular');

Route::get('/apoyo-transporte', function(){
    return view ('layouts.descripcion-apoyos.Apoyo-transporte');
})-> name ('Apoyo-transporte');

Route::get('/apoyo-monitoria', function(){
    return view ('layouts.descripcion-apoyos.Apoyo-monitoria');
})-> name ('Apoyo-monitoria');

// Route::get('/apoyo-fic', function(){
//     return view ('layouts.descripcion-apoyos.Apoyo-fic');
// })-> name ('Apoyo-fic');

Route::get('/apoyo-datos', function(){
    return view ('layouts.descripcion-apoyos.Apoyo-datos');
})-> name ('Apoyo-datos');

Route::get('/apoyo-alimentacion', function(){
    return view ('layouts.descripcion-apoyos.Apoyo-alimentacion');
})-> name ('Apoyo-alimentacion');

Route::get('/Nuestro-equipo', function(){
    return view('layouts.descripcion-equipo.Quienes-somos2');
})-> name ('Nosotros');


Route::get('/sostenimiento-fic', function(){
    return view ('layouts.descripcion-apoyos.sostenimiento-fic');
})-> name ('sostenimiento-fic');

//Ruta de evento próximo
Route::get('/evento_proximo', function(){
    return view ('layouts.descripcion-eventos.evento_proximo');
})-> name ('evento_proximo');

Route::get('/evento_anterior', function(){
    return view ('layouts.descripcion-eventos.evento_anterior');
})-> name ('evento_anterior');

Route::get('/inscrito_eventos', function(){
    return view ('layouts.crud_eventos.inscritos_eventos');
})-> name ('inscritos-eventos');


Route::get('/eventos', function(){
    return view ('layouts.eventos-ba.eventos');
})-> name ('eventos');


Route::get('/apoyos-sostenimiento', function(){
    return view ('layouts.descripcion-servicios.Servicio-apoyos-sostenimiento');
})-> name ('apoyos-sostenimiento');



Route::get('/Apoyos-Bienestar', function(){
    return view ('layouts.descripcion.servicios.apoyos_bienestar_aprendiz');
})-> name ('apoyos-sostenimientok');

Route::get('/Nuestras-dimensiones', function(){
    return view ('layouts.dimensiones_bienestar.dimensiones');
})-> name ('Dimensiones');


//////////////////////////////////////////////////////////////////////////////////////////////////
//RUTAS FORMULARIO INSCRIPCIÓN A APOYOS DE SOSTENIMIENTO /
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/formulario-inscripcion-apoyos', function(){
    return view ('formularios.apoyos.form-inscription-supports');
})-> name ('formulario-inscripcion-apoyos');

Route::get('/formulario-inscripcion-apoyo-alimentacion', function(){
    return view ('formularios\apoyos\form-inscription-supports-food');
})-> name ('formulario-inscripcion-apoyo-alimentacion');

Route::get('/formulario-inscripcion-apoyo-regular', function(){
    return view ('formularios\apoyos\form-inscription-supports-regular');
})-> name ('formulario-inscripcion-apoyo-regular');

Route::get('/formulario-inscripcion-apoyo-plan-datos', function(){
    return view ('formularios\apoyos\form-inscription-supports-dates');
})-> name ('formulario-inscripcion-apoyo-plan-datos');

Route::get('/formulario-inscripcion-apoyo-transporte', function(){
    return view ('formularios\apoyos\form-inscription-supports-transport');
})-> name ('formulario-inscripcion-apoyo-transporte');

///////////////////// Error //////////////////////////////
Route::get('/error', function(){
    return view ('layouts.error.404');
})-> name ('error');

// Rutas de formularios para inscribirse a los apoyos existentes.

//Ruta Formulario INSCRIBIRSE A UN APOYO

Route::get('/form-inscription-supports', function () {
    return view('formularios.apoyos.form-inscription-supports');
})->name('form-inscription-supports'); 

// Rutas Crud's (Create, Read, Update, Delete)

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Rutas CRUD (Create, Read, Update, Delete) Usuarios ///////////////////////////

Route::resource('auth', UserController::class);

Route::get('/listado-usuarios', [UserController::class, 'index'])->name('users.index')->middleware('auth');

Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth'); 

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::patch('/users/{id}/disable', [UserController::class, 'disable'])->name('users.disable');

Route::post('import', [UserController::class, 'import'])->name('import');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// (Rutas), Visualización eventos ///////////////////////////

Route::get('/Eventos', [EventsController::class,'viewevent'])->name('events.viewevent')->middleware('auth');

Route::get('/Informacion-eventos', [EventsController::class, 'viewEventUser'])->name('events.viewEventUser');

/////////////////////////// Rutas CRUD (Create, Read, Update, Delete) Eventos ///////////////////////////

Route::resource('eventos', EventsController::class)->middleware('auth');

Route::get('/listado-eventos', [EventsController::class, 'index'])->name('events.index')->middleware('auth');

Route::get('/show/{id}', [EventsController::class, 'show'])->name('events.show')->middleware('auth');

Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('events.edit')->middleware('auth'); 

Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update')->middleware('auth');

Route::patch('/events/{id}/disable', [EventsController::class, 'disable'])->name('events.disable')->middleware('auth');

Route::get('files/eventoimg/imgs/{image}', [EventsController::class, 'getImage'])->name('getImage');

// Registrar persona a un EVENTO
Route::get('/events/{id}/register', [EventsController::class, 'showRegistrationForm'])->name('events.registerForm')->middleware('auth');

Route::post('/events/{event}/register', [EventsController::class, 'register'])->name('events.register')->middleware('auth');

// Ruta para visualizar los inscritos para cada evento

Route::get('/events/{eventId}/registrations', [EventsController::class, 'showRegistrations'])->name('event.registrations')->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Rutas CRUD (Create, Read, Update, Delete) Citas ///////////////////////////

Route::resource('citas', CitasController::class)->middleware('auth');

Route::get('/listado-citas', [CitasController::class, 'index'])->name('citas.index')->middleware('auth');

Route::get('/show/{id}', [CitasController::class, 'show'])->name('citas.show')->middleware('auth');

Route::get('/edit/{id}', [CitasController::class, 'edit'])->name('citas.edit')->middleware('auth'); 

Route::put('/citas/{id}', [CitasController::class, 'update'])->name('citas.update')->middleware('auth');

Route::delete('/citas/{id}', [CitasController::class, 'destroy'])->name('citas.destroy')->middleware('auth');

Route::put('/citas/{id}/accion', [CitasController::class, 'handleAction'])->name('citas.handleAction')->middleware('auth');

Route::get('/citas', [CitasController::class, 'citaview'])->name('citas.citaview')->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Rutas CRUD (Create, Read, Update, Delete) Apoyos ///////////////////////////

Route::resource('apoyos_created', ApoyosCreatedController::class)->middleware('auth');

Route::get('/listado-apoyos', [ApoyosCreatedController::class, 'index'])->name('apoyosCreated.index')->middleware('auth');

Route::get('/show/{id}',[ApoyosCreatedController::class, 'show'])-> name('apoyos_created.show')->middleware('auth');

Route::patch('/apoyos/{id}/disable', [ApoyosCreatedController::class, 'disable'])->name('apoyos_created.disable')->middleware('auth');

Route::post('/apoyos/store', [ApoyosCreatedController::class, 'store'])->name('apoyos.store')->middleware('auth');

Route::patch('/apoyos/update/{id}', [ApoyosCreatedController::class, 'update'])->name('apoyos.update_Ins')->middleware('auth');

Route::post('/apoyos/user/store', [ApoyosCreatedController::class, 'store_user'])->name('apoyos.store_user')->middleware('auth');

Route::get('/Apoyo-FIC', [ApoyosCreatedController::class, 'Ap_fic'])->name('apoyo.fic');

Route::get('/Apoyo-Alimentacion', [ApoyosCreatedController::class, 'Ap_alimentacion'])->name('apoyo.alimentacion');

Route::get('/Apoyo-Datos', [ApoyosCreatedController::class, 'Ap_datos'])->name('apoyo.datos');

Route::get('/Apoyo-Sostenimiento-Regular', [ApoyosCreatedController::class, 'Ap_sostenimiento'])->name('apoyo.sostenimiento');

Route::get('/Apoyo-Transporte', [ApoyosCreatedController::class, 'Ap_transporte'])->name('apoyo.transporte');

Route::get('/files/apoyos/{category}/{filename}', [ApoyosCreatedController::class, 'getFile'])->name('getFile')->middleware('auth');

Route::get('/Formulario-Postulacion/{apoyo_id}', [ApoyosCreatedController::class, 'formulario_p'])->name('formulario_p')->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Rutas CRUD ( Update, Delete) Perfil ///////////////////////////

Route::resource('perfil', PerfilController::class)->middleware('auth');

Route::get('/mi-perfil', [PerfilController::class, 'index'])->name('perfil.index')->middleware('auth');

// Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update')->middleware('auth');

Route::patch('/cambiar-contrasena', [PerfilController::class, 'cambiarContrasena'])->name('perfil.cambiarcontrasena')->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////// Rutas CRUD ( Update, Delete) Apoyos ///////////////////////////

Route::resource('apoyos', ApoyosController::class)->middleware('auth');

Route::get('/show/{id}', [ApoyosController::class, 'show'])->name('apoyos.show')->middleware('auth');

Route::get('/edit/{id}', [ApoyosController::class, 'edit'])->name('apoyos.edit')->middleware('auth'); 

Route::put('/apoyos/{id}', [ApoyosController::class, 'update'])->name('apoyos.update')->middleware('auth');

Route::patch('/apoyos/{id}', [ApoyosController::class, 'disable'])->name('apoyos.disable')->middleware('auth');

///////////////////////////////////////////////////////////////////////////////////////////