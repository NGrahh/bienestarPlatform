<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidHour;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','update','cambiarContrasena']);
    }



    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Pasar el objeto $user a la vista
        return view('compartido.perfil', ['user' => $user]);

    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
    
        $validator = Validator::make($request->all(), [
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Existe un error en el formulario.');
        }
    
        $perfil = Perfil::where('user_id', $user->id)->firstOrFail();
    
        // Variable para almacenar el nombre de la imagen
        $imageName = $perfil->picture;
    
        if ($request->hasFile('picture')) {
            // Generar el nombre de la nueva imagen
            $imageName = time() . '.' . $request->picture->extension();
            // Mover la imagen a la carpeta pública
            $request->picture->move(public_path('images/profile'), $imageName);
        }
    
        // Actualizar el perfil con el nuevo nombre de imagen
        $perfil->update([
            'picture' => $imageName,
        ]);
    
        session()->flash('success', 'Perfil actualizado correctamente.');
        return redirect(route('perfil.index'));
    }
    
    public function cambiarContrasena(Request $request)
    {

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'newpassword' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',         // Al menos una letra minúscula
                'regex:/[A-Z]/',         // Al menos una letra mayúscula
                'regex:/[0-9]/',         // Al menos un número
                'regex:/[@$!%*?&]/',     // Al menos un carácter especial
            ],
            'renewpassword' => 'required|string|same:newpassword',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', '¡No se pudo efectuar el cambio!');
        }
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'La contraseña actual es incorrecta.']);
        }

        User::where('id', $user->id)
            ->update([
                'password' => Hash::make($request->newpassword)
            ]);



        // Redirigir con un mensaje de éxito
        return redirect()->route('perfil.index')->with('success', '¡Contraseña cambiada exitosamente!');
    }

}