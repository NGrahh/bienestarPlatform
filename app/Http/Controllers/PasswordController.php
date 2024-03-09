<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{

    public function recuperarcontrasena()
    {
        $this->cleanSessions();
        return view('auth.recuperar-contrasena');
    }
    
    public function cambiarcontrasena(Request $request)
    {
        $this->cleanSessions();
        return view('auth.cambiar-contrasena');
    }

    public function restablecercontrasena(Request $request) {

        $validator = Validator::make($request->all(), [
            'code' => 'required|string|min:5',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect(route('pass.cambiarcontrasena'))
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = DB::table('password_reset_tokens')->where('token', $request->get('code'))->first();

        if($data) {
            User::where('email', $data->email)->update([
                'password' => Hash::make($request->get('password')),
            ]);

            DB::table('password_reset_tokens')->where('token', $request->get('code'))->delete();

            session()->flash('success', 'Cambio de contraseña exitoso!');

            return view('auth.login');
        }
        session()->flash('error', 'No fue posible realizar el cambio!');
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
                $code = $this->generarCodigoAleatorio();
                // crear codigo de insertar en la tabla  password_reset_tokens
                $resultado = DB::table('password_reset_tokens')->insert([
                    'email' => $email,
                    'token' => $code,
                    'created_at' => Carbon::now()
                ]);
                
                // El correo electrónico existe en la tabla users
                $dataUser = ['name_user' => $user->name, 'surnames_user' => $user->lastname, 'code' => $code];
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
