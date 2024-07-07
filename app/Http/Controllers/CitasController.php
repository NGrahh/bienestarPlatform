<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\TypeDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidHour;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create']);
    }


    public function index()
    {
        
        $citas = Citas::select('id', 'name', 'lastname', 'dimensions_id', 'email', 'mobilenumber', 'hour', 'date', 'subjectCita')
            ->with('typeDimensions')
            ->get();
        $dimensions = TypeDimensions::all();
        return view('citascrud.citasindex',compact('citas', 'dimensions'));
        
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
            'date' => 'required|date_format:Y-m-d',
            'hour' => ['required', 'date_format:H:i', new ValidHour],
            'subjectCita'=>'required | string | min:1',
        ]);

        if ($validator->fails()){
            return redirect(route('form-appointment'))
            ->withErrors($validator)
            ->withInput()
            ->with('error','No se pudo crear la cita');
        }






        Citas::create([
            'name'=> $request->get('name'),
            'lastname'=> $request->get('lastname'),
            'dimensions_id'=> $request->get('dimensions_id'),
            'email'=> $request->get('email'),
            'mobilenumber'=> $request->get('mobilenumber'),
            'date' =>$request->get('date'),
            'hour'=> $request->get('hour'),
            'subjectCita'=> $request->get('subjectCita'),
        ]);

        session()->flash('success', 'Cita registrada correctamente!');

        return redirect(route('citas.index'));


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
            'date' => 'required|date_format:Y-m-d',
            'hour' => ['required', 'date_format:H:i', new ValidHour],
            'subjectCita'=>'required | string | min:1',
        ]);

        // Obtener la cita que deseas actualizar
        $citas  = Citas::findOrFail($id);
        $dimensions = TypeDimensions::all();
        
        $citas->update($request->all());

        return redirect()->route('citas.index',['dimension'=>$dimensions,])->with('success', 'Cita actualizada correctamente.');

    }

    public function destroy($id)
    {
        $citas = Citas::findOrFail($id);
        $citas->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}