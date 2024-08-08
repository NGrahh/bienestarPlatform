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
    // La función __construct() en el código proporcionado configura el middleware 'auth' para aplicarse a todas las rutas 
    // del controlador donde se encuentra este constructor. Sin embargo, excluye ciertas rutas específicas de la aplicación del middleware 
    // 'auth'. Las rutas excluidas son index, show, update, destroy, register, store, login, create, recuperarcontrasena y home. 
    // Esto significa que todas las rutas de este controlador estarán protegidas por autenticación, 
    // excepto las mencionadas anteriormente, que probablemente sean accesibles públicamente o requieran una lógica de acceso diferente

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'home','viewevent','viewEventUser','showRegistrations','register','disable']);
    }

    private $daysOfWeek = [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo'
    ];

    private $months = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];

    public function viewevent()
    {
        $currentDate = date('Y-m-d');
        
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)
                                ->where('status', true) // Filtrar por estado activo
                                ->orderBy('eventdate', 'asc')
                                ->paginate(3);
    
        $pastEvents = Events::where('eventdate', '<', $currentDate)
                            ->where('status', true) // Filtrar por estado activo
                            ->orderBy('eventdate', 'desc')
                            ->paginate(3);
    
        // Traducir día de la semana y nombre del mes para cada evento
        foreach ($upcomingEvents as $event) {
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
    
        foreach ($pastEvents as $event) {
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
    
        return view('layouts.descripcion-eventos.proximos_eventos', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
            'currentDate' => $currentDate
        ]);
    }

    public function viewEventUser()
    {
        $currentDate = date('Y-m-d');
    
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)
                                ->where('status', true) // Filtrar por estado activo
                                ->orderBy('eventdate', 'asc')
                                ->paginate(3);
    
        $pastEvents = Events::where('eventdate', '<', $currentDate)
                            ->where('status', true) // Filtrar por estado activo
                            ->orderBy('eventdate', 'desc')
                            ->paginate(3);
    
        // Traducir día de la semana y nombre del mes para cada evento
        foreach ($upcomingEvents as $event) {
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
    
        foreach ($pastEvents as $event) {
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }
    
        return view('layouts.descripcion-eventos.proximos_eventos', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
            'currentDate' => $currentDate
        ]);
    }
    
    private function spanishDayOfWeek($day)
    {
        return $this->daysOfWeek[$day];
    }
    
    private function spanishMonth($month)
    {
        return $this->months[$month];
    }
    
    

    public function index()
    {
        $events = Events::all();
        return view('eventoscrud.index', compact('events'));
    }

    public function create()
    {
        return view('formularios/eventos/form-create-event');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'eventname' => 'required|string|between:2,100',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventdate' => 'required|date|after_or_equal:today',
            'eventlimit' => 'required|numeric|digits_between:1,1000',
            'datestar' => [
                'required',
                'date',
                'before:eventdate',
            ],
            'dateendevent' => [
                'required',
                'date',
                'before:eventdate'
            ],
            'Subjectevent' => 'required|string|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('eventoimg/imgs'), $imageName);
        }
        

        Events::create([
            'eventname' => $request->get('eventname'),
            'picture' => $imageName,
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent')
        ]);

        session()->flash('success', 'Evento registrado correctamente!');
        return redirect(route('events.index'));
    }

    public function show(string $id)
    {
        $event = Events::findOrFail($id);
        return view('eventoscrud.showevento', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'eventname' => 'required|string|between:2,100',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'eventdate' => 'required|date',
            'eventlimit' => 'required|numeric|digits_between:1,1000',
            'datestar' => 'required|date',
            'dateendevent' => 'required|date',
            'Subjectevent' => 'required|string|between:2,4000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event = Events::findOrFail($id);

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
            $event->picture = $imageName;
        }

        $event->update([
            'eventname' => $request->get('eventname'),
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent')
        ]);

        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();
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
        $dimensions_types =TypeDimensions::all(); 
        return view('formularios.citas.form-appointment', compact('dimensions_types'));
    }

    

    public function inscrip()
    {
        return view('formularios/apoyos/form-inscription-supports');
    }


    public function showRegistrationForm($id)
    {
        $event = Events::findOrFail($id);
        $days_training = typeDayTraining::all();
        $programas = Programas::all();
        $user = auth()->user();
        $document = $user->document; 

        if (!session()->has('yourToken')) {
            session(['yourToken' => $user->yourToken]); 
        }
        
        return view('formularios.eventos.form-inscription-event', compact('event', 'days_training', 'programas', 'document', 'user'));
    }
    

    public function register(Request $request, $eventId)
    {
        $event = Events::findOrFail($eventId);
    
        // Verificar si el usuario ya está inscrito
        $registration = Event_registrations::where('event_id', $event->id)
            ->where('user_id', auth()->id())
            ->first();
    
        if ($registration) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este evento.');
        }
    
        // Verificar si quedan cupos disponibles
        if ($event->eventlimit <= 0) {
            return redirect()->back()->with('error', 'Este evento ha alcanzado su límite de inscripciones.');
        }
    
        // Reducir el límite de aforo en una unidad
        $event->eventlimit -= 1;
    
        // Guardar el evento actualizado en la base de datos
        $event->save();
    
        // Registrar al usuario en el evento
        Event_registrations::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->back()->with('success', 'Te has inscrito en el evento exitosamente.');
    }


    public function showRegistrations($eventId)
    {
        $event = Events::findOrFail($eventId);
        
        // Obtener las inscripciones para el evento
        $registrations = Event_registrations::where('event_id', $event->id)->get();
        
        return view('event_registrations.index', compact('event', 'registrations'));
    }


}