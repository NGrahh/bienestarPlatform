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
        $this->middleware('auth')->except(['index','store','update','cambiarContrasena']);
    }

    public function store(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'pictureuser' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'pictureuser.required' => 'La imagen de perfil es obligatoria.',
            'pictureuser.image' => 'El archivo debe ser una imagen.',
            'pictureuser.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'pictureuser.max' => 'El tamaño máximo permitido para la imagen es de 2 MB.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Existe un error en el formulario.');
        }
    
        // Generar el nombre de la nueva imagen
        $imageName = time() . '.' . $request->pictureuser->extension();
    
        // Mover la imagen a la carpeta pública
        $request->pictureuser->move(public_path('assets/img/perfilfotos'), $imageName);
        // C:\xampp\htdocs\plataformaBA\public\images\profile ya la ruta es esta
        // Crear el perfil con la imagen
        Perfil::create([
            'user_id' => $user->id,
            'pictureuser' => $imageName,
        ]);
    
        session()->flash('success', 'Perfil creado correctamente.');
        return redirect(route('perfil.index'));
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
            'pictureuser' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'pictureuser.required' => 'La imagen de perfil es obligatoria.',
            'pictureuser.image' => 'El archivo debe ser una imagen.',
            'pictureuser.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'pictureuser.max' => 'El tamaño máximo permitido para la imagen es de 2 MB.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Existe un error en el formulario.');
        }
    
        $perfil = Perfil::where('user_id', $user->id)->firstOrFail();
    
        // Variable para almacenar el nombre de la imagen
        $imageName = $perfil->pictureuser;
    
        if ($request->hasFile('pictureuser')) {
            // Generar el nombre de la nueva imagen
            $imageName = time() . '.' . $request->pictureuser->extension();
            // Mover la imagen a la carpeta pública
            $request->pictureuser->move(public_path('assets/img/perfilfotos'), $imageName);
        }
    
        // Actualizar el perfil con el nuevo nombre de imagen
        $perfil->update([
            'pictureuser' => $imageName,
        ]);
    
        session()->flash('success', 'Perfil actualizado correctamente.');
        return redirect(route('perfil.index'));
    }

    public function cambiarContrasena(Request $request)
    {
        // Validar los datos del formulario con mensajes personalizados
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
        ], [
            // Mensajes personalizados en español
            'password.required' => 'La contraseña actual es obligatoria.',
            'newpassword.required' => 'La nueva contraseña es obligatoria.',
            'newpassword.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'newpassword.regex' => 'La nueva contraseña debe contener al menos una letra mayúscula, una minúscula, un número y un carácter especial.',
            'renewpassword.required' => 'Debes confirmar la nueva contraseña.',
            'renewpassword.same' => 'Las contraseñas no coinciden.'
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
    
        // Actualizar la contraseña
        User::where('id', $user->id)
            ->update([
                'password' => Hash::make($request->newpassword)
            ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('perfil.index')->with('success', '¡Contraseña cambiada exitosamente!');
    }
    
}