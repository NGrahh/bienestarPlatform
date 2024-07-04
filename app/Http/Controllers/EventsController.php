<?php

namespace App\Http\Controllers;


use App\Models\Events;
use App\Models\TypeDimensions;
use App\Models\typeDayTraining; 
use App\Models\Programas;
use App\Models\User;
use App\Models\Event_registrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'home','viewevent','viewEventUser']);
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
    
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)->orderBy('eventdate', 'asc')->paginate(3);
        $pastEvents = Events::where('eventdate', '<', $currentDate)->orderBy('eventdate', 'desc')->paginate(3);
    
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
    
        $upcomingEvents = Events::where('eventdate', '>=', $currentDate)->orderBy('eventdate', 'asc')->paginate(3);
        $pastEvents = Events::where('eventdate', '<', $currentDate)->orderBy('eventdate', 'desc')->paginate(3);
    
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
            'eventdate' => 'required|date',
            'eventlimit' => 'required|numeric|digits_between:1,1000',
            'datestar' => 'required|date|unique:events,datestar',
            'dateendevent' => 'required|date',
            'Subjectevent' => 'required|string|min:1'
        ]);

        if ($validator->fails()) {
            return redirect(route('forms.create-events'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
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
            'Subjectevent' => 'required|string|min:1'
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


    public function showDimensions()
    {
        $dimensions_types =TypeDimensions::all(); 
        return view('formularios.citas.form-appointment', compact('dimensions_types'));
    }

    // public function showStudyTime()
    // {
        
    //     return view('formularios.eventos.form-inscription-event', compact());
    // }

    public function inscrip()
    {
        return view('formularios/apoyos/form-inscription-supports');
    }


    public function showRegistrationForm($id)
    {
        $event = Events::findOrFail($id);
        $days_training=typeDayTraining::all();
        $programas = Programas::find(session('Program_id'));
        $user = auth()->user();
        $document = $user->document; 
        return view('formularios.eventos.form-inscription-event', compact('event','days_training', 'programas', 'document'));
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

}