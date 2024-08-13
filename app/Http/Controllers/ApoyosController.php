<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoyos;
use Illuminate\Support\Facades\Validator;

class ApoyosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create','disable']);
    }

    public function index()
    {
        // Obtiene todos los registros de la tabla 'apoyos' junto con la relación 'user'.
        // La función 'with' se usa para cargar las relaciones de un modelo para evitar consultas N+1.
        $apoyos = Apoyos::with('user')->get();
        
        // Devuelve la vista 'apoyoscrud.apoyosindex' con la variable 'apoyos' disponible para la vista.
        // 'compact' crea un array asociativo con la variable 'apoyos' para pasarlo a la vista.
        return view('apoyoscrud.apoyosindex', compact('apoyos'));
    }

    public function create()
    {
        return view('formularios/apoyos/form-inscription-supports');
    }

    public function store_user(Request $request)
    {
        // Definir reglas de validación para los campos del formulario.
        $rules = [
            'mobilenumber' => 'required|numeric|digits_between:7,12', // Número de móvil obligatorio, numérico y con longitud entre 7 y 12 dígitos.
            'formatuser' => 'required|file|mimes:doc,docx,pdf|max:2048', // Archivo obligatorio con extensión doc, docx o pdf y tamaño máximo de 2048 KB.
            'photocopy' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'receipt' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'sisben' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'support' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen opcional con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
        ];

        // Validar la petición según las reglas definidas.
        $validator = Validator::make($request->all(), $rules);

        // Si la validación falla, redirige de vuelta al formulario con los errores y los datos introducidos por el usuario.
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Existe un error en el formulario.');
        }

        // Manejar el archivo 'formatuser' (Word o PDF).
        if ($request->file('formatuser')->isValid()) {
            $file = $request->file('formatuser');
            // Mueve el archivo a la carpeta pública 'images/archivos' y guarda el nombre del archivo.
            $formatuserPath = $file->move(public_path('images/archivos'), $file->getClientOriginalName());
            // Construye la ruta relativa del archivo.
            $formatuserPath = 'images/archivos/' . $file->getClientOriginalName();
        } else {
            // Si el archivo no es válido, redirige de vuelta al formulario con un mensaje de error.
            return redirect()->back()->withInput()->with('error', 'El archivo formatuser no es válido.');
        }

        // Array para almacenar los nombres de las imágenes.
        $imageNames = [];

        // Procesa cada archivo de imagen (si existe).
        foreach (['photocopy', 'receipt', 'sisben', 'support'] as $file) {
            if ($request->hasFile($file)) {
                $image = $request->file($file);
                // Genera un nombre único para el archivo usando el tiempo actual y la extensión del archivo.
                $imageName = time() . '_' . $file . '.' . $image->extension();
                // Mueve la imagen a la carpeta pública 'images/apoyos'.
                $image->move(public_path('images/apoyos'), $imageName);
                // Guarda el nombre del archivo en el array.
                $imageNames[$file] = $imageName;
            }
        }

        // Crear un nuevo registro en la base de datos con los datos del formulario.
        Apoyos::create([
            'user_id' => auth()->id(), // Obtiene el ID del usuario autenticado.
            'mobilenumber' => $request->get('mobilenumber'), // Número de móvil del formulario.
            'formatuser' => $formatuserPath, // Ruta del archivo Word o PDF.
            'photocopy' => $imageNames['photocopy'] ?? null, // Nombre de la imagen 'photocopy' o null si no se subió.
            'receipt' => $imageNames['receipt'] ?? null, // Nombre de la imagen 'receipt' o null si no se subió.
            'sisben' => $imageNames['sisben'] ?? null, // Nombre de la imagen 'sisben' o null si no se subió.
            'support' => $imageNames['support'] ?? null, // Nombre de la imagen 'support' o null si no se subió.
        ]);

        // Establece un mensaje de éxito en la sesión y redirige a la ruta 'form-inscription-supports'.
        session()->flash('success', 'Inscripción exitosa.');
        return redirect()->route('form-inscription-supports');
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario con reglas específicas.
        // Se han corregido algunos errores en las reglas de validación.
        $request->validate([
            'name' => 'required|string|between:2,100', // Nombre requerido, cadena de caracteres con longitud entre 2 y 100.
            'lastname' => 'required|string|between:2,100', // Apellido requerido, cadena de caracteres con longitud entre 2 y 100.
            'email' => 'required|email|max:100|unique:users,email,' . $id, // Email requerido, formato válido, longitud máxima de 100, debe ser único en la tabla 'users' excepto para el usuario actual.
            'mobilenumber' => 'required|numeric|digits_between:7,12', // Número de móvil requerido, numérico y longitud entre 7 y 12 dígitos.
            'formatuser' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Archivo de imagen requerido con extensiones permitidas y tamaño máximo de 2048 KB.
            'photocopy' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen requerida con extensiones permitidas y tamaño máximo de 2048 KB.
            'receipt' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen requerida con extensiones permitidas y tamaño máximo de 2048 KB.
            'sisben' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen requerida con extensiones permitidas y tamaño máximo de 2048 KB.
        ]);

        // Buscar el registro en la tabla 'Apoyos' con el ID proporcionado.
        // Si no se encuentra el registro, lanza una excepción 'ModelNotFoundException' que
        // mostrará una página 404.
        $apoyo = Apoyos::findOrFail($id);

        // Actualiza el registro con los datos proporcionados en la solicitud.
        // Nota: Esto actualizará todos los campos incluidos en la solicitud.
        $apoyo->update($request->all());

        // Redirige a la ruta 'apoyos.index' con un mensaje de éxito en la sesión.
        return redirect()->route('apoyos.index')
            ->with('success', 'Inscripción actualizada exitosamente.');
    }

    public function disable($id)
    {
        // Encuentra el registro en la tabla 'Apoyos' por el ID proporcionado.
        // Si no se encuentra el registro, lanza una excepción 'ModelNotFoundException' que
        // mostrará una página 404.
        $apoyo = Apoyos::findOrFail($id);
        
        // Cambia el estado del registro de activo a inactivo o viceversa.
        // Si 'status' es verdadero (activo), 'newStatus' será falso (inactivo), y viceversa.
        $newStatus = !$apoyo->status;
        
        // Actualiza el estado en la base de datos con el nuevo valor.
        $apoyo->update(['status' => $newStatus]);
        
        // Genera un mensaje de éxito basado en el nuevo estado.
        // Si 'newStatus' es verdadero (activo), el mensaje será 'Usuario habilitado correctamente'.
        // Si 'newStatus' es falso (inactivo), el mensaje será 'Usuario deshabilitado correctamente'.
        $message = $newStatus ? 'Usuario habilitado correctamente.' : 'Usuario deshabilitado correctamente.';
        
        // Redirige al usuario a la página de índice de 'apoyos' con un mensaje de éxito.
        return redirect()->route('apoyos.index')->with('success', $message);
    }
    
}