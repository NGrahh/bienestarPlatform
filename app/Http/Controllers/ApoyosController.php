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
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create']);
    }

    public function index()
    {
        $apoyos = Apoyos::select('id', 'name', 'lastname', 'email', 'mobilenumber', 'formatuser', 'photocopy', 'receipt', 'sisben' );
        return view('apoyos.index', compact('apoyos'));
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
        // $request->validate([
        //     'name' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|email',
        //     'mobilenumber' => 'required',
        //     'formatuser' => 'required',
        //     'photocopy' => 'required',
        //     'receipt' => 'required',
        //     'sisben' => 'required',
        // ]);

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
        }

        $validatos = Validator::make($request -> all(),[
            'name' => 'required | string | between: 2,100' ,
            'lastname' => 'required | string | between: 2,100',
            'email' => 'required|email1 max:100 | unique:users',
            'mobilenumber' => 'required | numeric | digits_between: 7,12',
            'formatuser' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'photocopy' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'receipt' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
            'sisben' => 'required | image | mimes:jpn,png,jpeg,gif | max:2048',
        ]);

        Apoyos::create([
            'name' => $request->get('name'),
            'lastname' => $request->get('name'),
            'email'=> $request->get('email'),
            'mobilenumber'=> $request->get('mobilenumber'),
            'formatuser' => $imageName,
            'photocopy' => $imageName,
            'receipt' => $imageName,
            'sisben' => $imageName
        ]);

        session()->flash('success', 'Inscripción exitosa.');
        return redirect('apoyos.index');
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
}
