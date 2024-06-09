<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\TypeDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create']);
    }


    public function index()
    {
        $citas = Citas::all();
        $dimensions = TypeDimensions::all();
        return view('citascrud.citasindex', ['dimension'=>$dimensions,],compact('citas'));
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required | string | between:2,100',
            'lastname' => 'required | string | between:2,100' ,
            'dimensions_id' => 'required|string',
            'email' => 'required | string | email | max:100 | unique:users',
            'mobilenumber'=> 'required|numeric|digits_between:7,12',
            'hour' => 'required | integer |between:0,23',
            'subjectCita'=>'required | string | min:1',
        ]);

        if ($validator->fails()){
            return redirect(route('citascrud.index'))
            ->withErrors($validator)
            ->withInput();
        }






        Citas::create([
            'name'=> $request->get('name'),
            'lastname'=> $request->get('lastname'),
            'dimensions_id'=> $request->get('dimensions_id'),
            'email'=> $request->get('email'),
            'mobilenumber'=> $request->get('mobilenumber'),
            'hour'=> $request->get('hour'),
            'subjectCita'=> $request->get('subjectCita'),
        ]);

        session()->flash('success', 'Cita registrada correctamente!');

        return redirect(route('citascrud.index'));


    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
         // Validar los datos del formulario
        $request->validate([
            'name' => 'required | string | between:2,100',
            'lastname' => 'required | string | between:2,100' ,
            'dimensions_id' => 'required|string',
            'email' => 'required|string|email|max:100|unique:users,email,'.$id,
            'mobilenumber'=> 'required|numeric|digits_between:7,12',
            'hour' => 'required | integer |between:0,23',
            'subjectCita'=>'required | string | min:1',
        ]);

        // Obtener la cita que deseas actualizar
        $citas  = Citas::findOrFail($id);

        $citas->update($request->all());

        return redirect()->route('citascrud.index')->with('success', 'Cita actualizada correctamente.');

    }

    public function destroy($id)
    {
        $citas = Citas::findOrFail($id);
        $citas->delete();
        return redirect()->route('citascrud.index')->with('success', 'Cita eliminada correctamente.');
    }




}