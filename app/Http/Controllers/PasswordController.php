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
        // Limpia las sesiones activas del usuario
        $this->cleanSessions();
    
        // Devuelve la vista 'auth.recuperar-contrasena'
        return view('auth.recuperar-contrasena');
    }

    public function cambiarcontrasena(Request $request)
    {
        // Limpia las sesiones activas del usuario
        $this->cleanSessions();
    
        // Devuelve la vista 'auth.cambiar-contrasena'
        return view('auth.cambiar-contrasena');
    }

    public function restablecercontrasena(Request $request) 
    {
        // Valida los datos del request
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|min:5',      // El campo 'code' es obligatorio, debe ser una cadena de al menos 5 caracteres
            'password' => 'required|string',        // El campo 'password' es obligatorio y debe ser una cadena
        ]);
    
        // Si la validación falla, redirige de vuelta con los errores y los datos ingresados
        if ($validator->fails()) {
            return redirect(route('pass.cambiarcontrasena'))
                ->withErrors($validator)        // Pasa los errores de validación a la vista
                ->withInput();                  // Pasa los datos ingresados a la vista
        }
        
        // Busca el registro de token de restablecimiento de contraseña en la base de datos
        $data = DB::table('password_reset_tokens')->where('token', $request->get('code'))->first();
    
        // Si el token es válido
        if ($data) {
            // Actualiza la contraseña del usuario correspondiente con el nuevo valor
            User::where('email', $data->email)->update([
                'password' => Hash::make($request->get('password')), // Encripta la nueva contraseña
            ]);
    
            // Elimina el token de restablecimiento de la base de datos
            DB::table('password_reset_tokens')->where('token', $request->get('code'))->delete();
    
            // Establece un mensaje de éxito en la sesión
            session()->flash('success', 'Cambio de contraseña exitoso!');
    
            // Redirige al usuario a la vista de inicio de sesión
            return view('auth.login');
        }
    
        // Si el token no es válido, establece un mensaje de error en la sesión
        session()->flash('error', 'No fue posible realizar el cambio!');
    
        // Redirige de vuelta a la vista de cambio de contraseña
        return view('auth.cambiar-contrasena');
    }

    public function recuperarcontrasenasolicitud(Request $request)
    {
        // Obtiene el correo electrónico del request
        $email = $request->get('email');
    
        // Busca un usuario con el correo electrónico proporcionado
        $user = User::where('email', $email)->first();
    
        // Limpia las sesiones activas del usuario
        $this->cleanSessions();
    
        // Si el usuario existe
        if ($user) {
    
            // Verifica si ya existe una solicitud de restablecimiento de contraseña para el correo electrónico
            $existsRequest = DB::table('password_reset_tokens')->where('email', $email)->first();
    
            // Si no existe una solicitud previa
            if (!$existsRequest) {
                // Genera un código aleatorio para el restablecimiento de la contraseña
                $code = $this->generarCodigoAleatorio();
                // Inserta el código de restablecimiento en la tabla 'password_reset_tokens'
                $resultado = DB::table('password_reset_tokens')->insert([
                    'email' => $email,
                    'token' => $code,
                    'created_at' => Carbon::now()
                ]);
                
                // Datos del usuario para enviar por correo
                $dataUser = ['name_user' => $user->name, 'surnames_user' => $user->lastname, 'code' => $code];
                // Envía un correo electrónico con el código de restablecimiento de contraseña
                Mail::send('emails.solicitud-restablecer-password', $dataUser, function ($message) use ($request) {
                    $message->from('bienestardlaprendiz@gmail.com', 'Recuperar contraseña');
                    $message->to($request->get('email'))->subject('Notificación: Recuperar contraseña');
                });
    
                // Establece un mensaje de éxito en la sesión
                session()->flash('success', 'Revisa el correo!');
                return view('auth.recuperar-contrasena');
            } else {
                // Establece un mensaje de error en la sesión si ya se envió un correo
                session()->flash('error', 'Ya se envió un email para cambiar la contraseña!');
            }
    
        } else {
            // Si el correo electrónico no existe en la base de datos
            session()->flash('error', 'El correo no existe en nuestro sistema!');
            session()->flash('email', $email);
        }
    
        // Devuelve la vista de recuperación de contraseña
        return view('auth.recuperar-contrasena');
    }

    function generarCodigoAleatorio() {
        // Genera una cadena aleatoria de 5 caracteres a partir de números y letras mayúsculas
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    }
    

    function cleanSessions() {
        // Verifica si hay un mensaje de error o un correo electrónico en las sesiones
        if (Session::has('error') || Session::has('email')) {
            // Elimina el mensaje de error de la sesión
            Session::forget('error');
            // Elimina el correo electrónico de la sesión
            Session::forget('email');
        }
        // Verifica si hay un mensaje de éxito en las sesiones
        if (Session::has('success')) {
            // Elimina el mensaje de éxito de la sesión
            Session::forget('success');
        }        
    }

}