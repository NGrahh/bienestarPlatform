<?php

namespace App\Http\Controllers;


use App\Models\Events;
use App\Models\TypeDimensions;
use App\Models\typeDayTraining; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'home','viewevent']);
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
        $events = Events::paginate(6);

        // Traducir día de la semana y nombre del mes para cada evento
        foreach ($events as $event) {
            $event->dayOfWeek = $this->spanishDayOfWeek(date('N', strtotime($event->eventdate)));
            $event->monthName = $this->spanishMonth(date('n', strtotime($event->eventdate)));
        }

        return view('layouts.descripcion-eventos.proximos_eventos', compact('events'));
    }

    private function spanishDayOfWeek($day) {
        return $this->daysOfWeek[$day];
    }

    private function spanishMonth($month) {
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

    public function showStudyTime()
    {
        $days_training=typeDayTraining::all(); 
        return view('formularios.eventos.form-inscription-event', compact('days_training'));
    }

    public function inscrip()
    {
        return view('formularios/apoyos/form-inscription-supports');
    }



}







