<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoyos_created;
use Illuminate\Support\Facades\Validator;

class ApoyosCreatedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create']);
    }

    public function index()
    {
        // Obtiene todos los registros de la tabla 'Apoyos_created'.
        // 'get()' recupera todos los registros sin aplicar filtros adicionales.
        $apoyos_created = Apoyos_created::get();
        
        // Devuelve la vista 'apoyosCCcrud.apoyosCC' con la variable 'apoyos_created' disponible para la vista.
        // 'compact' crea un array asociativo con la variable 'apoyos_created' para pasarla a la vista.
        return view('apoyosCCcrud.apoyosCC', compact('apoyos_created'));
    }

    public function show($id)
    {
        // Busca el registro en la tabla 'Apoyos_created' con el ID proporcionado.
        // Si no se encuentra el registro, lanza una excepción 'ModelNotFoundException' que
        // mostrará una página 404.
        $apoyos_created = Apoyos_created::findOrFail($id);
    
        // Devuelve la vista 'apoyos_created.show' con la variable 'apoyos_created' disponible para la vista.
        // 'compact' crea un array asociativo con la variable 'apoyos_created' para pasarla a la vista.
        return view('apoyos_created.show', compact('apoyos_created'));
    }

    public function disable($id)
    {
        // Busca el registro en la tabla 'Apoyos_created' utilizando el ID proporcionado.
        // Si no se encuentra el registro, lanza una excepción 'ModelNotFoundException' que
        // mostrará una página 404.
        $apoyos_created = Apoyos_created::findOrFail($id);
        
        // Cambia el estado del registro de activo a inactivo o viceversa.
        // Si 'appoiment_status' es verdadero (activo), 'newStatus' será falso (inactivo), y viceversa.
        $newStatus = !$apoyos_created->appoiment_status;
        
        // Actualiza el campo 'appoiment_status' en la base de datos con el nuevo valor.
        $apoyos_created->update(['appoiment_status' => $newStatus]);
        
        // Genera un mensaje de éxito basado en el nuevo estado.
        // Si 'newStatus' es verdadero (activo), el mensaje será 'Apoyo habilitado correctamente'.
        // Si 'newStatus' es falso (inactivo), el mensaje será 'Apoyo deshabilitado correctamente'.
        $message = $newStatus ? 'Apoyo habilitado correctamente.' : 'Apoyo deshabilitado correctamente.';
        
        // Redirige al usuario a la vista de índice de 'apoyosCreated' con un mensaje de éxito en la sesión.
        return redirect()->route('apoyosCreated.index')->with('success', $message);
    }

}