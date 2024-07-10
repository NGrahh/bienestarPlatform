<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidHour;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create','update_user']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar si el usuario está autenticado
        if ($user) {
            // Verificar el rol del usuario
            if ($user->rol_id == 5) {
                // Si el rol es 5, retornar la vista para perfil de aprendiz
                return view('compartido.perfil_Aprendiz');
            } else {
                // Si no es rol 5, retornar la vista para perfil normal
                return view('compartido.perfil');
            }
        }
    
        // Manejar el caso donde el usuario no está autenticado
        return redirect()->route('home')->with('error', 'Debe iniciar sesión para acceder a su perfil.');
    }
    
    

    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Definir las reglas de validación
        $validator = Validator::make($request->all(), [
            'pictureuser' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_me' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'Twitter_Profile' => 'required|url|max:255',
            'Linkedin_Profile' => 'required|url|max:255',
            'morning_start' => ['nullable', 'date_format:H:i', new ValidHour],
            'morning_end' => ['nullable', 'date_format:H:i', new ValidHour],
            'afternoon_start' => ['nullable', 'date_format:H:i', new ValidHour],
            'afternoon_end' => ['nullable', 'date_format:H:i', new ValidHour],
        ]);

        // Comprobar si hay errores de validación
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Existe un error en el formulario.');
        }

        // Si pasa la validación, proceder con el almacenamiento
        if ($request->hasFile('pictureuser')) {
            $imageName = time() . '.' . $request->pictureuser->extension();
            $request->pictureuser->move(public_path('images/profile'), $imageName);
        }

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Crear el perfil
        Perfil::create([
            'user_id' => $userId,
            'pictureuser' => $imageName, // Guardar solo el nombre de la imagen
            'about_me' => $request->get('about_me'),
            'phone_number' => $request->get('phone_number'),
            'Twitter_Profile' => $request->get('Twitter_Profile'),
            'Linkedin_Profile' => $request->get('Linkedin_Profile'),
            'morning_start' => $request->get('morning_start'),
            'morning_end' => $request->get('morning_end'),
            'afternoon_start' => $request->get('afternoon_start'),
            'afternoon_end' => $request->get('afternoon_end'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('perfil.index')->with('success', 'Perfil creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        $validator = Validator::make($request->all(), [
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_me' => 'required|string|min:2',
            'phone_number' => 'required|string|max:20',
            'Twitter_Profile' => 'required|string',
            'Linkedin_Profile' => 'required|string',
            'morning_start' =>  ['nullable', 'date_format:H:i', new ValidHour],
            'morning_end' =>  ['nullable', 'date_format:H:i', new ValidHour],
            'afternoon_start' =>  ['nullable', 'date_format:H:i', new ValidHour],
            'afternoon_end' =>  ['nullable', 'date_format:H:i', new ValidHour],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Existe un error en el formulario.');
        }

        $perfil = Perfil::where('user_id', $user->id)->firstOrFail();

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images/profile'), $imageName);
            $perfil->picture = $imageName;
        }

        $perfil->update([
            'about_me' => $request->input('about_me'),
            'phone_number' => $request->input('phone_number'),
            'Twitter_Profile' => $request->input('Twitter_Profile'),
            'Linkedin_Profile' => $request->input('Linkedin_Profile'),
            'morning_start' => $request->input('morning_start'),
            'morning_end' => $request->input('morning_end'),
            'afternoon_start' => $request->input('afternoon_start'),
            'afternoon_end' => $request->input('afternoon_end'),
        ]);

        session()->flash('success', 'Perfil actualizado correctamente.');
        return redirect(route('perfil.index'));
    }




        public function update_user(Request $request)
        {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'about_me' => 'required|string|min:2',
                'phone_number' => 'required|string|max:20',
                'Twitter_Profile' => 'required|string',
                'Linkedin_Profile' => 'required|string',
                'morning_start' => ['nullable', 'date_format:H:i:s'],
                'morning_end' => ['nullable', 'date_format:H:i:s'],
                'afternoon_start' => ['nullable', 'date_format:H:i:s'],
                'afternoon_end' => ['nullable', 'date_format:H:i:s'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Existe un error en el formulario.');
            }

            $perfil = Perfil::where('user_id', $user->id)->firstOrFail();

            // Actualizar campos según la solicitud, sin sobrescribir si están vacíos
            $perfil->update([
                'about_me' => $request->input('about_me'),
                'phone_number' => $request->input('phone_number'),
                'Twitter_Profile' => $request->input('Twitter_Profile'),
                'Linkedin_Profile' => $request->input('Linkedin_Profile'),
                'morning_start' => $request->input('morning_start') ?: $perfil->morning_start,
                'morning_end' => $request->input('morning_end') ?: $perfil->morning_end,
                'afternoon_start' => $request->input('afternoon_start') ?: $perfil->afternoon_start,
                'afternoon_end' => $request->input('afternoon_end') ?: $perfil->afternoon_end,
            ]);

            session()->flash('success', 'Perfil actualizado correctamente.');
            return redirect(route('perfil.index'));
        }
        
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
