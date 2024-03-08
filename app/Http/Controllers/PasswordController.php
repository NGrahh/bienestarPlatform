<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class PasswordController extends Controller
{

    public function recuperarcontrasena()
    {
        $this->cleanSessions();
        return view('auth.recuperar-contrasena');
    }
    
    public function cambiarcontrasena()
    {
        $this->cleanSessions();
        return view('auth.cambiar-contrasena');
    }
    
    public function recuperarcontrasenasolicitud(Request $request)
    {
        $email = $request->get('email');

        $user = User::where('email', $email)->first();

        $this->cleanSessions();

        if ($user) {

            $existsRequest  = DB::table('password_reset_tokens')->where('email', $email)->first();

            if (!$existsRequest) {

                // crear codigo de insertar en la tabla  password_reset_tokens


                // El correo electrónico existe en la tabla users
                $dataUser = ['name_user' => $user->name, 'surnames_user' => $user->lastname, 'codigo' => $this->generarCodigoAleatorio()];
                Mail::send('emails.solicitud-restablecer-password', $dataUser, function ($message) use ($request) {
                    $message->from('bienestardlaprendiz@gmail.com', 'Recuperar contraseña');
                    $message->to($request->get('email'))->subject('Notificación: Recuperar contraseña');
                });

                session()->flash('success', 'Revisa el correo!');
                return view('auth.recuperar-contrasena');
            } else {
                session()->flash('error', 'Ya se envio un email para cambiar la contraseña!');
            }



        } else {
            // El correo electrónico no existe en la tabla users
            session()->flash('error', 'El correo no existe en nuestro sistema!');
            session()->flash('email', $email);
        }

        return view('auth.recuperar-contrasena');
    }

    function generarCodigoAleatorio() {
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    }

    function cleanSessions() {
        if (Session::has('error') || Session::has('email')) {
            // Eliminar todas las sesiones flash
            Session::forget('error');
            Session::forget('email');
        }
        if (Session::has('success')) {
            Session::forget('success');
        }        
    }
}
