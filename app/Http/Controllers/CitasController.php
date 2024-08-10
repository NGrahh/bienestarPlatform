<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\User;
use App\Models\TypeDimensions;
use App\Models\accionesCitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidHour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'citaview','handleAction']);
    }


    // public function index(Request $request)
    // {
    //     // Obtener el ID de la dimensión seleccionada de la solicitud
    //     $selectedDimensionId = $request->input('dimension_id');

    //     // Realiza la consulta con join y ordenación
    //     $query = Citas::select('citas.id', 'citas.dimensions_id', 'citas.mobilenumber', 'citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status', 'users.name', 'users.lastname', 'users.email')
    //         ->join('users', 'citas.user_id', '=', 'users.id')
    //         ->orderBy('citas.status') // Ordenar por status
    //         ->orderBy('citas.id')     // Luego por id
    //         ->with('typeDimensions');  // Relación, si es necesario

    //     // Filtrar por dimensión si se seleccionó una
    //     if ($selectedDimensionId) {
    //         $query->where('citas.dimensions_id', $selectedDimensionId);
    //     }

    //     $citas = $query->get();
    //     $dimensions = TypeDimensions::all();

    //     return view('citascrud.citasindex', compact('citas', 'dimensions'));
    // }
    public function index(Request $request)
    {
        // Obtener el ID de la dimensión seleccionada de la solicitud
        $selectedDimensionId = $request->input('dimension_id');
    
        // Realiza la consulta con join y ordenación
        $query = Citas::select('citas.id', 'citas.dimensions_id', 'citas.mobilenumber', 'citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status', 'users.name', 'users.lastname', 'users.email')
            ->join('users', 'citas.user_id', '=', 'users.id')
            ->orderBy('citas.status') // Ordenar por status
            ->orderBy('citas.id')     // Luego por id
            ->with('typeDimensions');  // Relación, si es necesario
    
        // Filtrar por dimensión si se seleccionó una
        if ($selectedDimensionId) {
            $query->where('citas.dimensions_id', $selectedDimensionId);
        }
    
        $citas = $query->get();
        $dimensions = TypeDimensions::all();
        $acciones=accionesCitas::all();
    
        return view('citascrud.citasindex', compact('citas', 'acciones','dimensions', 'selectedDimensionId'));
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
            'hour' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    // Validación personalizada para asegurar que la hora no sea anterior a la hora actual
                    $currentDateTime = now();
                    $appointmentDateTime = strtotime($request->input('date') . ' ' . $value);
    
                    if ($appointmentDateTime < $currentDateTime->timestamp) {
                        $fail('La hora ingresada ya ha pasado.');
                    }
                },
                new ValidHour
            ],
            'subjectCita' => 'required|string|min:1',
        ]);
        
        if ($validator->fails()) {
            return redirect(route('form-appointment'))
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'No se pudo crear la cita');
        }
    
        // Validación personalizada para asegurarse de que no exista una cita en la misma dimensión 
        // dentro de 30 minutos antes o después de la hora solicitada
        $existingAppointment = Citas::where('dimensions_id', $request->get('dimensions_id'))
            ->whereDate('date', $request->get('date'))
            ->where(function ($query) use ($request) {
                $startTime = strtotime($request->get('hour')) - 1800; // 30 minutos antes
                $endTime = strtotime($request->get('hour')) + 1800; // 30 minutos después
                
                $query->whereBetween('hour', [date('H:i', $startTime), date('H:i', $endTime)]);
            })
            ->first();
        
        if ($existingAppointment) {
            return redirect(route('form-appointment'))
                ->withInput()
                ->with('error', 'Ya existe una cita en la misma dimensión dentro de los 30 minutos antes o después.');
        }
    
        // Crear la nueva cita
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

        // Verifica el estado de la cita
        if ($cita->status === 1) {
            return redirect()->back()
                ->with('error', 'No se puede modificar una cita que ya ha sido aceptada.');
        }


        $validator = Validator::make($request->all(), [
            'dimensions_id' => 'required|string',
            'mobilenumber' => 'required|numeric|digits_between:7,12',
            'date' => 'required|date_format:Y-m-d',
            'hour' => ['required', 'date_format:H:i:s', new ValidHour],
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
        return back();

    }


    public function citaview()
    {
        $userId = Auth::id();
    
        $generalAppointments = DB::table('citas')
            ->select('citas.date', 'citas.hour')
            ->get();

        // Obtener perfiles de usuarios con roles 2, 3 y 4
        $responsibles = DB::table('perfil')
            ->join('users', 'perfil.user_id', '=', 'users.id')
            ->whereIn('users.rol_id', [2, 3, 4])
            ->select('users.name', 'users.lastname', 'perfil.morning_start', 'perfil.morning_end', 'perfil.afternoon_start', 'perfil.afternoon_end')
            ->get();


        $citas = Citas::select('citas.id', 'citas.dimensions_id', 'citas.mobilenumber', 'citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status','citas.reason', 'users.name', 'users.lastname', 'users.email')
            ->join('users', 'citas.user_id', '=', 'users.id')
            ->where('citas.user_id', $userId)
            ->with('typeDimensions') // Si es necesario cargar alguna relación adicional
            ->get();
    
        $dimensions = TypeDimensions::all();
    
        return view('citascrud.miscitas', compact('citas', 'dimensions','responsibles','generalAppointments'));
    }

    // CÓDIGO DE LA CITA: 
    // 0: Cita Pendiente
    // 1: Cita Confirmada
    // 2: Cita Pospuesta
    // 3: Cita Finalizada
    public function handleAction(Request $request, $id)
    {
        $cita = Citas::findOrFail($id);
        $action = $request->input('actions');
        $reason = $request->input('reason');
        
        // Definir reglas de validación condicionales
        $rules = [
            'actions' => 'required|integer|in:1,2,3',
            'reason' => 'nullable|string|max:1000',
        ];

        if (in_array($action, [2, 3])) {
            $rules['reason'] = 'required|string|max:1000';
        }
        
        // Validar los datos
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Debes dar un motivo!');
        }

        switch ($action) {
            case 1:
                $cita->update(['status' => '1']);
                session()->flash('success', 'La cita ha sido aceptada exitosamente!');
                break;

            case 2:
                $cita->update(['status' => '2', 'reason' => $reason]);
                session()->flash('success', 'La cita ha sido pospuesta exitosamente!');
                break;

            case 3:
                $cita->update(['status' => '3', 'reason' => $reason]);
                session()->flash('success', 'La cita ha sido rechazada exitosamente!');
                break;

            default:
                session()->flash('error', 'Acción no válida.');
                return redirect()->back();
        }

        return redirect()->route('citas.index', [
            'dimension_id' => $request->input('dimension_id'),
            //'selected_action' => $action->input('actions')  // Añadir el valor de la acción seleccionada
        ]);
    }


    public function destroy($id)
    {
        $citas = Citas::findOrFail($id);
        $citas->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }

}