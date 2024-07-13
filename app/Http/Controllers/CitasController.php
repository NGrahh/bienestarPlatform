<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\User;
use App\Models\TypeDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidHour;
use Illuminate\Support\Facades\Auth;


class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'citaview']);
    }


    public function index()
    {
        $citas = Citas::select('citas.id', 'citas.dimensions_id', 'citas.mobilenumber', 'citas.hour', 'citas.date', 'citas.subjectCita','citas.status', 'users.name', 'users.lastname', 'users.email')
            ->join('users', 'citas.user_id', '=', 'users.id')
            ->with('typeDimensions') 
            ->get();
    
        $dimensions = TypeDimensions::all();
    
        return view('citascrud.citasindex', compact('citas', 'dimensions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
            // Validación de los campos del formulario
        $validator = Validator::make($request->all(), [
            'dimensions_id' => 'required|string',
            'mobilenumber' => 'required|numeric|digits_between:7,12',
            'date' => [
                'required',
                'date_format:Y-m-d',
                // Validación personalizada para asegurar que la fecha no sea en el pasado
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(now()->format('Y-m-d'))) {
                        $fail('La fecha ingresada ya ha pasado.');
                    }
                },
            ],
            'hour' => ['required', 'date_format:H:i', new ValidHour],
            'subjectCita' => 'required|string|min:1',
        ]);
        
            if ($validator->fails()) {
                return redirect(route('form-appointment'))
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'No se pudo crear la cita');
            }
        
            // Validación personalizada para asegurarse de que no exista una cita a la misma hora y dimensión
            $existingAppointment = Citas::where('dimensions_id', $request->get('dimensions_id'))
                ->where('date', $request->get('date'))
                ->where('hour', $request->get('hour'))
                ->first();
        
            if ($existingAppointment) {
                return redirect(route('form-appointment'))
                    ->withInput()
                    ->with('error', 'Ya existe una cita a la misma hora en la misma dimensión');
            }
        
            Citas::create([
                'user_id' => Auth::id(),
                'dimensions_id' => $request->get('dimensions_id'),
                'mobilenumber' => $request->get('mobilenumber'),
                'date' => $request->get('date'),
                'hour' => $request->get('hour'),
                'subjectCita' => $request->get('subjectCita'),
            ]);
        
            session()->flash('success', 'Cita registrada correctamente!');
        
            return redirect(route('form-appointment'));
    }
    

    public function show($id)
    {
        // Obtener la cita por su ID
        $cita = Citas::findOrFail($id);

        // Retornar una vista con los detalles de la cita
        return view('citas.index', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $cita = Citas::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'dimensions_id' => 'required|string',
            'mobilenumber' => 'required|numeric|digits_between:7,12',
            'date' => 'required|date_format:Y-m-d',
            'hour' => ['required', 'date_format:H:i', new ValidHour],
            'subjectCita' => 'required|string|min:1',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'No se pudo actualizar la cita');
        }
    
        $cita->update($request->all());
    
        session()->flash('success', 'Cita actualizada correctamente!');
        return redirect(route('citas.index'));
    }


    public function citaview()
    {
        $userId = Auth::id();

        $citas = Citas::select('citas.id', 'citas.dimensions_id', 'citas.mobilenumber', 'citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status', 'users.name', 'users.lastname', 'users.email')
            ->join('users', 'citas.user_id', '=', 'users.id')
            ->where('citas.user_id', $userId)
            ->with('typeDimensions') // Si es necesario cargar alguna relación adicional
            ->get();

        $dimensions = TypeDimensions::all();

        return view('citascrud.miscitas', compact('citas', 'dimensions'));
    }





    public function acceptCita($id)
    {
        // Código para aceptar la cita
        $cita = Citas::findOrFail($id);
        $cita->update(['status' => '1']);
        session()->flash('success', 'Cita aceptada correctamente!');
        return redirect()->route('citas.index');


    }





    public function destroy($id)
    {
        $citas = Citas::findOrFail($id);
        $citas->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}


// class CitasComponent extends Component
// {
//     

//     public function rejectCita($id)
//     {
//         // Código para rechazar la cita
//         $cita = Citas::findOrFail($id);
//         $cita->update(['status' => '0']);
//         session()->flash('success', 'Cita rechazada correctamente!');
//     }

//     public function deleteCita($id)
//     {
//         // Código para eliminar la cita
//         $cita = Citas::findOrFail($id);
//         $cita->delete();
//         session()->flash('success', 'Cita eliminada correctamente!');
//     }
// }