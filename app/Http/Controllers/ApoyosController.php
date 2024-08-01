<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoyos;
use Illuminate\Support\Facades\Validator;

class ApoyosController extends Controller
{
    /**
     * Muestra una lista de todos los apoyos.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create','disable']);
    }

    public function index()
    {
        $apoyos = Apoyos::with('user')->get();
        return view('apoyoscrud.apoyosindex', compact('apoyos'));
    }

    /**
     * Muestra el formulario para crear un nuevo apoyo.
     */
    public function create()
    {
        return view('formularios/apoyos/form-inscription-supports');
    }

    /**
     * Almacena un nuevo apoyo en la base de datos.
     */
    public function store(Request $request)
    {
        // Definir reglas de validación
        $rules = [
            'mobilenumber' => 'required|numeric|digits_between:7,12',
            'formatuser' => 'required|file|mimes:doc,docx,pdf|max:2048',
            'photocopy' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'receipt' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'sisben' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'support' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    
        // Validar la petición
        $validator = Validator::make($request->all(), $rules);
    
        // Manejar errores de validación
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Existe un error en el formulario.');
        }
    
        // Manejar el archivo formatuser (Word o PDF)
        if ($request->file('formatuser')->isValid()) {
            $file = $request->file('formatuser');
            $formatuserPath = $file->move(public_path('images/archivos'), $file->getClientOriginalName());
            $formatuserPath = 'images/archivos/' . $file->getClientOriginalName(); // Guarda la ruta relativa
        } else {
            return redirect()->back()->withInput()->with('error', 'El archivo formatuser no es válido.');
        }
    
        // Array para almacenar los nombres de las imágenes
        $imageNames = [];
    
        // Procesar cada archivo de imagen individualmente
        foreach (['photocopy', 'receipt', 'sisben', 'support'] as $file) {
            if ($request->hasFile($file)) {
                $image = $request->file($file);
                $imageName = time() . '_' . $file . '.' . $image->extension();
                $image->move(public_path('images/apoyos'), $imageName);
                $imageNames[$file] = $imageName;
            }
        }
    
        // Crear el registro en la base de datos
        Apoyos::create([
            'user_id' => auth()->id(), // O cualquier método que obtenga el ID del usuario
            'mobilenumber' => $request->get('mobilenumber'),
            'formatuser' => $formatuserPath, // Guardamos la ruta del archivo Word o PDF
            'photocopy' => $imageNames['photocopy'] ?? null,
            'receipt' => $imageNames['receipt'] ?? null,
            'sisben' => $imageNames['sisben'] ?? null,
            'support' => $imageNames['support'] ?? null,
        ]);
    
        session()->flash('success', 'Inscripción exitosa.');
        return redirect()->route('form-inscription-supports');
    }
    
    /**
     * Muestra los detalles de un apoyo específico.
     */
    public function show($id)
    {
        $apoyo = Apoyos::findOrFail($id);
        return view('apoyos.show', compact('apoyo'));
    }

    /**
     * Muestra el formulario para editar un apoyo.
     */
    public function edit($id)
    {
        $apoyo = Apoyos::findOrFail($id);
        return view('apoyos.edit', compact('apoyo'));
    }

    /**
     * Actualiza un apoyo específico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | string | between: 2,100' ,
            'lastname' => 'required | string | between: 2,100',
            'email' => 'required|email1 max:100 | unique:users',
            'mobilenumber' => 'required | numeric | digits_between: 7,12',
            'formatuser' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'photocopy' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'receipt' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'sisben' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
        ]);

        $apoyo = Apoyos::findOrFail($id);
        $apoyo->update($request->all());

        return redirect()->route('apoyos.index')
            ->with('success', 'Inscripción actualizada exitosamente.');
    }

    /**
     * Elimina un apoyo específico de la base de datos.
     */
    public function destroy($id)
    {
        $apoyo = Apoyos::findOrFail($id);
        $apoyo->delete();

        return redirect()->route('apoyos.index')
            ->with('success', 'Apoyo eliminado exitosamente.');
    }


    public function disable($id)
    {
        // Encuentra el usuario por su ID o lanza una excepción si no existe
        $apoyo = Apoyos::findOrFail($id);
        
        // Cambia el estado del usuario de activo a inactivo o viceversa
        $newStatus = !$apoyo->status; // Cambia el estado al opuesto al actual
        
        // Actualiza el estado en la base de datos
        $apoyo->update(['status' => $newStatus]);
        
        // Genera el mensaje de éxito basado en el nuevo estado
        $message = $newStatus ? 'Usuario habilitado correctamente.' : 'Usuario deshabilitado correctamente.';
        
        // Redirige de vuelta a la página de usuarios con un mensaje de éxito
        return redirect()->route('apoyos.index')->with('success', $message);
    }




}
