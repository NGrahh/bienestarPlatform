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
use Carbon\Carbon; // Importa Carbon

class CitasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'citaview','handleAction']);
    }

    public function index(Request $request)
    {
        // Obtener el ID de la dimensión seleccionada de la solicitud
        $selectedDimensionId = $request->input('dimension_id');
        
        // Inicializar la consulta para obtener citas, realizando un join con la tabla 'users'
        $query = Citas::select('citas.id', 'citas.dimensions_id', 'citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status', 'users.name', 'users.lastname','users.numberphone', 'users.email')
            ->join('users', 'citas.user_id', '=', 'users.id') // Realiza un join con la tabla 'users' usando 'user_id'
            ->orderBy('citas.status') // Ordenar los resultados por 'status'
            ->orderBy('citas.id')     // Luego ordenar por 'id'
            ->with('typeDimensions'); // Cargar la relación 'typeDimensions' si es necesario
        
        // Si se seleccionó una dimensión, aplicar el filtro correspondiente
        if ($selectedDimensionId) {
            $query->where('citas.dimensions_id', $selectedDimensionId);
        }
        
        // Ejecutar la consulta y obtener los resultados
        $citas = $query->get();
        
        // Obtener todas las dimensiones y acciones disponibles
        $dimensions = TypeDimensions::all();
        $acciones = accionesCitas::all();
        
        // Pasar los datos a la vista 'citascrud.citasindex' con las variables disponibles
        return view('citascrud.citasindex', compact('citas', 'acciones', 'dimensions', 'selectedDimensionId'));
    }

    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $validator = Validator::make($request->all(), [
            'dimensions_id' => 'required|string', // ID de dimensión requerido y debe ser una cadena
            'date' => [
                'required',
                'date_format:Y-m-d', // Formato de fecha requerido
                // Validación personalizada para asegurar que la fecha no sea en el pasado
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(now()->format('Y-m-d'))) {
                        $fail('La fecha ingresada ya ha pasado.');
                    }
                },
            ],
            'hour' => [
                'required',
                'date_format:H:i', // Formato de hora requerido
                function ($attribute, $value, $fail) {
                    // Obtener la fecha y hora actual en formato de Carbon
                    $now = now();
                    $providedTime = Carbon::createFromFormat('H:i', $value, 'America/Bogota');
    
                    // Comparar la hora proporcionada con la hora actual
                    if ($providedTime <= $now) {
                        $fail('La hora ingresada ya ha pasado.');
                    }
                },
            ],
            'subjectCita' => 'required|string|min:1', // Asunto de la cita requerido, cadena con longitud mínima de 1
        ]);
        
        // Si la validación falla, redirige de vuelta al formulario con los errores y los datos ingresados
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
        
        // Si existe una cita en el rango de tiempo especificado, redirige al formulario con un mensaje de error
        if ($existingAppointment) {
            return redirect(route('form-appointment'))
                ->withInput()
                ->with('error', 'Ya existe una cita en la misma dimensión dentro de los 30 minutos antes o después.');
        }
        
        // Crear la nueva cita
        Citas::create([
            'user_id' => Auth::id(), // ID del usuario autenticado
            'dimensions_id' => $request->get('dimensions_id'),
            'date' => $request->get('date'),
            'hour' => $request->get('hour'),
            'subjectCita' => $request->get('subjectCita'),
        ]);
        
        // Establecer un mensaje de éxito en la sesión
        session()->flash('success', 'Cita registrada correctamente!');
        
        // Redirige al formulario de cita
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
        // Busca la cita por su ID, lanzando una excepción si no se encuentra
        $cita = Citas::findOrFail($id);
    
        // Verifica el estado de la cita
        if ($cita->status === '1') {
            // Si la cita ya ha sido aceptada (estado 1), redirige de vuelta con un mensaje de error
            return redirect()->back()
                ->with('error', 'No se puede modificar una cita que ya ha sido aceptada.');
        }
    
        // Valida los datos del formulario
        $validator = Validator::make($request->all(), [
            'dimensions_id' => 'required|string', // ID de dimensión requerido y debe ser una cadena
            'date' => 'required|date_format:Y-m-d', // Formato de fecha requerido
            'hour' => [
                'required',
                'date_format:H:i', // Formato de hora requerido
                function ($attribute, $value, $fail) {
                    // Obtener la fecha y hora actual en formato de Carbon
                    $now = now();
                    $providedTime = Carbon::createFromFormat('H:i', $value, 'America/Bogota');
    
                    // Comparar la hora proporcionada con la hora actual
                    if ($providedTime <= $now) {
                        $fail('La hora ingresada ya ha pasado.');
                    }
                },
            ],
            'subjectCita' => 'required|string|min:1', // Asunto de la cita requerido, cadena con longitud mínima de 1
        ]);
        
        // Si la validación falla, redirige de vuelta al formulario con los errores y los datos ingresados
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'No se pudo actualizar la cita');
        }
        
        // Actualiza la cita con los datos proporcionados
        $cita->update($request->all());
        
        // Establece un mensaje de éxito en la sesión
        session()->flash('success', 'Cita actualizada correctamente!');
        
        // Redirige de vuelta a la página anterior
        return back();
    }

    public function citaview()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();
        
        // Obtener todas las citas generales (sin filtrar por usuario)
        $generalAppointments = DB::table('citas')
            ->select('citas.date', 'citas.hour') // Seleccionar solo la fecha y hora
            ->get(); // Obtener los resultados
        
        // Obtener perfiles de usuarios con roles 2, 3 y 4
        $responsibles = DB::table('perfil')
            ->join('users', 'perfil.user_id', '=', 'users.id') // Unir tablas 'perfil' y 'users'
            ->whereIn('users.rol_id', [2, 3, 4]) // Filtrar usuarios con roles 2, 3 y 4
            ->select('users.name', 'users.lastname', 'perfil.morning_start', 'perfil.morning_end', 'perfil.afternoon_start', 'perfil.afternoon_end') // Seleccionar campos necesarios
            ->get(); // Obtener los resultados
    
        // Obtener las citas específicas del usuario autenticado
        $citas = Citas::select('citas.id', 'citas.dimensions_id','citas.hour', 'citas.date', 'citas.subjectCita', 'citas.status', 'citas.reason', 'users.name', 'users.lastname', 'users.email', 'users.numberphone')
            ->join('users', 'citas.user_id', '=', 'users.id') // Unir tablas 'citas' y 'users'
            ->where('citas.user_id', $userId) // Filtrar citas por el ID del usuario autenticado
            ->with('typeDimensions') // Cargar la relación 'typeDimensions' si es necesario
            ->get(); // Obtener los resultados
        
        // Obtener todas las dimensiones disponibles
        $dimensions = TypeDimensions::all();
        
        // Pasar los datos a la vista 'citascrud.miscitas'
        return view('citascrud.miscitas', compact('citas', 'dimensions', 'responsibles', 'generalAppointments'));
    }

    // CÓDIGO DE LA CITA: 
    // 0: Cita Pendiente
    // 1: Cita Confirmada
    // 2: Cita Pospuesta
    // 3: Cita Finalizada

    public function handleAction(Request $request, $id)
    {
        // Encuentra la cita por su ID o lanza una excepción si no existe
        $cita = Citas::findOrFail($id);
        // Obtiene la acción seleccionada y el motivo del request
        $action = $request->input('actions');
        $reason = $request->input('reason');
        
        // Define reglas de validación condicionales
        $rules = [
            'actions' => 'required|integer|in:1,2,3', // La acción debe ser un entero entre 1 y 3
            'reason' => 'nullable|string|max:5000', // Motivo opcional con un máximo de 1000 caracteres
        ];
    
        // Si la acción es 2 (posponer) o 3 (rechazar), el motivo es requerido
        if (in_array($action, [2, 3])) {
            $rules['reason'] = 'required|string|max:5000';
        }
        
        // Valida los datos del request contra las reglas definidas
        $validator = Validator::make($request->all(), $rules);
    
        // Si la validación falla, redirige de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Debes dar un motivo!');
        }
    
        // Realiza la acción correspondiente según el valor de 'actions'
        switch ($action) {
            case 1:
                // Acepta la cita
                $cita->update(['status' => '1']);
                session()->flash('success', 'La cita ha sido aceptada exitosamente!');
                break;
    
            case 2:
                // Pospone la cita y actualiza el motivo
                $cita->update(['status' => '2', 'reason' => $reason]);
                session()->flash('success', 'La cita ha sido pospuesta exitosamente!');
                break;
    
            case 3:
                // Rechaza la cita y actualiza el motivo
                $cita->update(['status' => '3', 'reason' => $reason]);
                session()->flash('success', 'La cita ha sido rechazada exitosamente!');
                break;
    
            default:
                // En caso de acción no válida
                session()->flash('error', 'Acción no válida.');
                return redirect()->back();
        }
    
        // Redirige a la lista de citas con el ID de dimensión en la consulta
        return redirect()->route('citas.index', [
            'dimension_id' => $request->input('dimension_id'),
            //'selected_action' => $action->input('actions')  // Añadir el valor de la acción seleccionada si es necesario
        ]);
    }

    public function destroy($id)
    {
        // Encuentra la cita por su ID o lanza una excepción si no existe
        $citas = Citas::findOrFail($id);
        
        // Elimina la cita de la base de datos
        $citas->delete();
        
        // Redirige a la página de índice de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }

}