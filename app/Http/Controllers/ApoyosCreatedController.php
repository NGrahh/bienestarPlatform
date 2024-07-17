<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoyos_created;
use Illuminate\Support\Facades\Validator;

class ApoyosCreatedController extends Controller
{
    /**
     * Muestra una lista de todos los apoyos.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create']);
    }

    public function index()
    {
        $apoyos_created = Apoyos_created::get();
        return view('apoyosCCcrud.apoyosCC', compact('apoyos_created'));
    }
    
    public function show($id)
    {
        $apoyos_created = Apoyos_created::findOrFail($id);
        return view('apoyos_created.show', compact('apoyos_created'));
    }
    public function disable($id)
    {
        // Encuentra el usuario por su ID o lanza una excepción si no existe
        $apoyos_created = Apoyos_created::findOrFail($id);
        
        // Cambia el estado del usuario de activo a inactivo o viceversa
        $newStatus = !$apoyos_created->appoiment_status; // Cambia el estado al opuesto al actual
        
        // Actualiza el estado en la base de datos
        $apoyos_created->update(['appoiment_status' => $newStatus]);
        
        // Genera el mensaje de éxito basado en el nuevo estado
        $message = $newStatus ? 'Apoyo habilitado correctamente.' : 'Apoyo deshabilitado correctamente.';
        
        // Redirige de vuelta a la página de usuarios con un mensaje de éxito
        return redirect()->route('apoyosCreated.index')->with('success', $message);
    }
}