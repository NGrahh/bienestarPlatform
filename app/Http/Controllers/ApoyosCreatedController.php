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
        $apoyos_created = Apoyos_creared::findOrFail($id);
        return view('apoyos_created.show', compact('apoyos_created'));
    }
}