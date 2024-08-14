<?php

namespace App\Http\Controllers;


use App\Models\Events;
use App\Models\TypeDimensions;
use App\Models\typeDayTraining; 
use App\Models\Programas;
use App\Models\User;
use App\Models\Event_registrations;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'home','viewevent','viewEventUser','showRegistrations','register','disable']);
    }

    private $daysOfWeek = [
        // Propiedad privada que almacena los días de la semana en español
        // La clave de cada elemento en el array representa el número del día de la semana,
        // donde 1 es Lunes y 7 es Domingo. Los valores son los nombres correspondientes de los días en español.
        1 => 'Lunes',    // Día 1: Lunes
        2 => 'Martes',   // Día 2: Martes
        3 => 'Miércoles',// Día 3: Miércoles
        4 => 'Jueves',   // Día 4: Jueves
        5 => 'Viernes',  // Día 5: Viernes
        6 => 'Sábado',   // Día 6: Sábado
        7 => 'Domingo'   // Día 7: Domingo
    ];

    private $months = [
        // Propiedad privada que almacena los meses del año en español
        // La clave de cada elemento en el array representa el número del mes,
        // donde 1 es Enero y 12 es Diciembre. Los valores son los nombres correspondientes de los meses en español.
        1  => 'Enero',       // Mes 1: Enero
        2  => 'Febrero',     // Mes 2: Febrero
        3  => 'Marzo',       // Mes 3: Marzo
        4  => 'Abril',       // Mes 4: Abril
        5  => 'Mayo',        // Mes 5: Mayo
        6  => 'Junio',      // Mes 6: Junio
        7  => 'Julio',      // Mes 7: Julio
        8  => 'Agosto',     // Mes 8: Agosto
        9  => 'Septiembre', // Mes 9: Septiembre
        10 => 'Octubre',    // Mes 10: Octubre
        11 => 'Noviembre',  // Mes 11: Noviembre
        12 => 'Diciembre'   // Mes 12: Diciembre
    ];

    private function spanishDayOfWeek($day)
    {
        // Devuelve el nombre del día de la semana en español basado en el número del día de la semana.
        // El número del día (1-7) se debe mapear a un nombre en español usando el array $daysOfWeek.
        // Ejemplo: 1 -> 'Lunes', 2 -> 'Martes', etc.
        return $this->daysOfWeek[$day];
    }

    private function spanishMonth($month)
    {
        // Devuelve el nombre del mes en español basado en el número del mes.
        // El número del mes (1-12) se debe mapear a un nombre en español usando el array $months.
        // Ejemplo: 1 -> 'Enero', 2 -> 'Febrero', etc.
        return $this->months[$month];
    }

    public function viewevent()
    {
        // Obtener la fecha actual en formato 'Y-m-d'
        $currentDate = date('Y-m-d');
        
        // Consultar los eventos futuros a partir de la fecha actual, filtrando por estado activo
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)
                                ->where('status', true) // Filtrar por eventos activos
                                ->orderBy('eventdate', 'asc') // Ordenar por fecha del evento de manera ascendente
                                ->paginate(3); // Paginación con 3 eventos por página
        
        // Consultar los eventos pasados antes de la fecha actual, filtrando por estado activo
        $pastEvents = Events::where('eventdate', '<', $currentDate)
                            ->where('status', true) // Filtrar por eventos activos
                            ->orderBy('eventdate', 'desc') // Ordenar por fecha del evento de manera descendente
                            ->paginate(4); // Paginación con 4 eventos por página
        
        // Traducir el día de la semana y el nombre del mes para cada evento futuro
        foreach ($upcomingEvents as $event) {
            // Obtener el día de la semana en español
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            // Obtener el nombre del mes en español
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
        
        // Traducir el día de la semana y el nombre del mes para cada evento pasado
        foreach ($pastEvents as $event) {
            // Obtener el día de la semana en español
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            // Obtener el nombre del mes en español
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
        
        // Retornar la vista con los eventos futuros, pasados y la fecha actual
        return view('layouts.descripcion-eventos.proximos_eventos', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
            'currentDate' => $currentDate
        ]);
    }

    public function viewEventUser()
    {
        // Obtener la fecha actual en formato 'Y-m-d'
        $currentDate = date('Y-m-d');
        
        // Consultar los eventos futuros a partir de la fecha actual, filtrando por estado activo
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)
                                ->where('status', true) // Filtrar por eventos activos
                                ->orderBy('eventdate', 'asc') // Ordenar por fecha del evento de manera ascendente
                                ->paginate(3); // Paginación con 3 eventos por página
        
        // Consultar los eventos pasados antes de la fecha actual, filtrando por estado activo
        $pastEvents = Events::where('eventdate', '<', $currentDate)
                            ->where('status', true) // Filtrar por eventos activos
                            ->orderBy('eventdate', 'desc') // Ordenar por fecha del evento de manera descendente
                            ->paginate(3); // Paginación con 3 eventos por página
        
        // Traducir el día de la semana y el nombre del mes para cada evento futuro
        foreach ($upcomingEvents as $event) {
            // Obtener el día de la semana en español
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            // Obtener el nombre del mes en español
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
        
        // Traducir el día de la semana y el nombre del mes para cada evento pasado
        foreach ($pastEvents as $event) {
            // Obtener el día de la semana en español
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            // Obtener el nombre del mes en español
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
        
        // Retornar la vista con los eventos futuros, pasados y la fecha actual
        return view('layouts.descripcion-eventos.proximos_eventos', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
            'currentDate' => $currentDate
        ]);
    }

    public function index()
    {
        // Recupera todos los eventos de la base de datos.
        $events = Events::all();
    
        // Pasa los eventos a la vista 'eventoscrud.index' para su visualización.
        // La variable 'events' estará disponible en la vista con todos los eventos recuperados.
        return view('eventoscrud.index', compact('events'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo evento.
        // La vista 'formularios/eventos/form-create-event' contiene el formulario para ingresar los detalles del nuevo evento.
        return view('formularios/eventos/form-create-event');
    }

    public function store(Request $request)
    {
        // Se crea una instancia del validador con las reglas para validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'eventname' => 'required|string|between:2,100', // El nombre del evento es requerido, debe ser una cadena y tener entre 2 y 100 caracteres
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es requerida, debe ser un archivo de imagen con las extensiones especificadas y no debe superar los 2MB
            'eventdate' => 'required|date|after_or_equal:today', // La fecha del evento es requerida, debe ser una fecha válida y no puede ser anterior a hoy
            'eventlimit' => 'required|numeric|digits_between:1,1000', // El límite de eventos es requerido, debe ser un número con entre 1 y 1000 dígitos
            'datestar' => [
                'required',
                'date',
                'before:eventdate', // La fecha de inicio es requerida, debe ser una fecha válida y debe ser anterior a la fecha del evento
            ],
            'dateendevent' => [
                'required',
                'date',
                'before:eventdate' // La fecha de fin del evento es requerida, debe ser una fecha válida y debe ser anterior a la fecha del evento
            ],
            'Subjectevent' => 'required|string|max:5000' // El asunto del evento es requerido, debe ser una cadena con al menos un carácter
        ]);
    
        // Si la validación falla, se redirige de vuelta al formulario con los errores y los datos ingresados
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Inicializa la variable para el nombre de la imagen
        $imageName = null;
    
        // Verifica si el archivo de imagen ha sido subido
        if ($request->hasFile('picture')) {
            // Obtiene el archivo de la solicitud
            $image = $request->file('picture');
            // Crea un nombre único para la imagen usando el timestamp actual y la extensión del archivo
            $imageName = time() . '.' . $image->extension();
            // Almacena la imagen en el directorio especificado y obtiene el path
            $path = $image->storeAs('public/files/eventoimg/imgs', $imageName);
    
            // Verifica si la imagen se guardó correctamente
            if (!$path) {
                return redirect()
                    ->back()
                    ->withErrors(['picture' => 'Error al guardar la imagen.'])
                    ->withInput();
            }
        }
    
        // Crea un nuevo registro en la base de datos con los datos del evento
        Events::create([
            'eventname' => $request->get('eventname'),
            'picture' => $imageName,
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent')
        ]);
    
        // Establece un mensaje de éxito en la sesión
        session()->flash('success', 'Evento registrado correctamente!');
        // Redirige al usuario a la página de índice de eventos
        return redirect(route('events.index'));
    }

    public function getImage($imageName)
    {
        // Obtiene la ruta completa del archivo de imagen en el almacenamiento
        $path = storage_path('app/public/files/eventoimg/imgs/' . $imageName);
    
        // Verifica si el archivo existe en la ruta especificada
        if (!file_exists($path)) {
            // Si el archivo no existe, aborta la solicitud con un error 404 (No Encontrado)
            abort(404);
        }
    
        // Devuelve el archivo de imagen como una respuesta al navegador
        return response()->file($path);
    }

    public function show(string $id)
    {
        // Busca el evento en la base de datos utilizando el ID proporcionado
        // Si el evento no se encuentra, lanzará una excepción 404 automáticamente
        $event = Events::findOrFail($id);
    
        // Devuelve la vista 'eventoscrud.showevento' con los datos del evento
        // 'compact('event')' crea un array con la clave 'event' y el valor correspondiente a la variable $event
        return view('eventoscrud.showevento', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        // Valida los datos recibidos en la solicitud según las reglas definidas
        $validator = Validator::make($request->all(), [
            'eventname' => 'required|string|between:2,100',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventdate' => 'required|date',
            'eventlimit' => 'required|numeric|digits_between:1,1000',
            'datestar' => 'required|date',
            'dateendevent' => 'required|date',
            'Subjectevent' => 'required|string|between:2,4000'
        ]);
    
        // Si la validación falla, redirige de vuelta con los errores y los datos ingresados
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Busca el evento en la base de datos usando el ID proporcionado
        $event = Events::findOrFail($id);
    // Inicializa $imageName como null
        // Verifica si se ha subido un archivo de imagen
        if ($request->hasFile('picture')) {
            // Se comentaron las líneas anteriores de manejo de archivos y se agregaron nuevas líneas para almacenar la imagen
    
            // Obtiene el archivo de imagen de la solicitud
            $image = $request->file('picture');
            // Crea un nombre único para la imagen usando el timestamp actual y la extensión del archivo
            $imageName = time() . '.' . $image->extension();
            // Almacena la imagen en el directorio especificado y obtiene el path
            $path = $image->storeAs('public/files/eventoimg/imgs', $imageName);
    
            // Verifica si la imagen se guardó correctamente
            if (!$path) {
                return redirect()
                    ->back()
                    ->withErrors(['picture' => 'Error al guardar la imagen.'])
                    ->withInput();
            }
        }
    
        // Actualiza los datos del evento con la información proporcionada
        $event->update([
            'eventname' => $request->get('eventname'),
            'picture' => $imageName,
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent')
        ]);
    
        // Redirige al índice de eventos con un mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Busca el evento en la base de datos usando el ID proporcionado
        // Si el evento no se encuentra, lanzará una excepción 404 automáticamente
        $event = Events::findOrFail($id);
    
        // Elimina el evento de la base de datos
        $event->delete();
    
        // Redirige al índice de eventos con un mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente.');
    }

    public function disable($id)
    {
        // Encuentra el Evento por su ID o lanza una excepción si no existe
        $event = Events::findOrFail($id);
        
        // Cambia el estado del Evento de activo a inactivo o viceversa
        $newStatus = !$event ->status; // Cambia el estado al opuesto al actual
        
        // Actualiza el estado en la base de datos
        $event ->update(['status' => $newStatus]);
        
        // Genera el mensaje de éxito basado en el nuevo estado
        $message = $newStatus ? 'Evento habilitado correctamente.' : 'Evento deshabilitado correctamente.';
        
        // Redirige de vuelta a la página de usuarios con un mensaje de éxito
        return redirect()->route('events.index')->with('success', $message);
    }

    public function showDimensions()
    {
        // Obtiene todos los registros de la tabla 'TypeDimensions'
        $dimensions_types = TypeDimensions::all(); 
    
        // Devuelve la vista 'formularios.citas.form-appointment' con los datos de los tipos de dimensiones
        // 'compact('dimensions_types')' crea un array con la clave 'dimensions_types' que contiene el valor de la variable $dimensions_types
        return view('formularios.citas.form-appointment', compact('dimensions_types'));
    }

    public function inscrip()
    {
        // Devuelve la vista 'formularios/apoyos/form-inscription-supports'
        return view('formularios/apoyos/form-inscription-supports');
    }

    public function showRegistrationForm($id)
    {
        // Busca el evento en la base de datos usando el ID proporcionado
        // Si el evento no se encuentra, lanzará una excepción 404 automáticamente
        $event = Events::findOrFail($id);
    
        // Obtiene todos los registros de la tabla 'typeDayTraining'
        $days_training = typeDayTraining::all();
    
        // Obtiene todos los registros de la tabla 'Programas'
        $programas = Programas::all();
    
        // Obtiene el usuario autenticado actualmente
        $user = auth()->user();
    
        // Obtiene el documento del usuario autenticado
        $document = $user->document; 
    
        // Verifica si la sesión no tiene una clave 'yourToken'
        if (!session()->has('yourToken')) {
            // Si la clave 'yourToken' no está en la sesión, la establece con el valor del token del usuario
            session(['yourToken' => $user->yourToken]); 
        }
        
        // Devuelve la vista 'formularios.eventos.form-inscription-event' con los datos necesarios
        // 'compact(...)' crea un array con las claves y valores de las variables proporcionadas
        return view('formularios.eventos.form-inscription-event', compact('event', 'days_training', 'programas', 'document', 'user'));
    }

    public function register(Request $request, $eventId)
    {
        // Busca el evento en la base de datos usando el ID proporcionado
        // Si el evento no se encuentra, lanzará una excepción 404 automáticamente
        $event = Events::findOrFail($eventId);
    
        // Verifica si el usuario ya está inscrito en el evento
        $registration = Event_registrations::where('event_id', $event->id)
            ->where('user_id', auth()->id())
            ->first();
    
        // Si el usuario ya está inscrito, redirige de vuelta con un mensaje de error
        if ($registration) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este evento.');
        }
    
        // Verifica si quedan cupos disponibles para el evento
        if ($event->eventlimit <= 0) {
            // Si el evento ha alcanzado su límite de inscripciones, redirige de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Este evento ha alcanzado su límite de inscripciones.');
        }
    
        // Reduce el límite de aforo del evento en una unidad
        $event->eventlimit -= 1;
    
        // Guarda el evento actualizado en la base de datos
        $event->save();
    
        // Registra al usuario en el evento creando un nuevo registro en la tabla 'Event_registrations'
        Event_registrations::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
        ]);
    
        // Redirige de vuelta con un mensaje de éxito indicando que la inscripción fue exitosa
        return redirect()->back()->with('success', 'Te has inscrito en el evento exitosamente.');
    }

    public function showRegistrations($eventId)
    {
        // Busca el evento en la base de datos usando el ID proporcionado
        // Si el evento no se encuentra, lanzará una excepción 404 automáticamente
        $event = Events::findOrFail($eventId);
        
        // Obtiene todas las inscripciones asociadas con el evento específico
        $registrations = Event_registrations::where('event_id', $event->id)->get();
        
        // Devuelve la vista 'event_registrations.index' con los datos del evento y las inscripciones
        // 'compact('event', 'registrations')' crea un array con las claves 'event' y 'registrations' que contienen los valores correspondientes
        return view('event_registrations.index', compact('event', 'registrations'));
    }

}