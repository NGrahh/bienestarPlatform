<?php

namespace App\Http\Controllers;

use App\Models\TypeDimensions;
use App\Models\typeDayTraining;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','update','destroy','store', 'create','home' ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();

        return view('eventoscrud.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formularios/eventos/form-create-event');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        // Mover la imagen a un directorio público y obtener el nombre del archivo
        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
        }

        // Crear el evento y almacenar el nombre del archivo en la base de datos
        Events::create([
            'eventname' => $request->get('eventname'),
            'picture' => $imageName,
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent'),
        ]);

        session()->flash('success', 'Evento registrado correctamente!');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Events::findOrFail($id);
        return view('eventoscrud.showevento', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Events::findOrFail($id);
        return view('events.index', compact('event'));
    }

    
    // Update the specified resource in storage.
    
    public function update(Request $request, Events $event)
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
            return redirect(route('events.edit', $event->id))
                ->withErrors($validator)
                ->withInput();
        }
    
        // Si se ha subido una nueva imagen, moverla y actualizar el nombre en la base de datos
        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
            $event->picture = $imageName;
        }
    
        // Actualizar los demás campos del evento
        $event->eventname = $request->get('eventname');
        $event->eventdate = $request->get('eventdate');
        $event->eventlimit = $request->get('eventlimit');
        $event->datestar = $request->get('datestar');
        $event->dateendevent = $request->get('dateendevent');
        $event->Subjectevent = $request->get('Subjectevent');
    
        // Guardar los cambios en la base de datos
        $event->save();
    
        session()->flash('success', 'Evento actualizado correctamente!');
        return redirect(route('events.show', $event->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        //
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
