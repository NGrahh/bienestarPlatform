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
        $this->middleware('event')->except(['index','show','update','destroy', 'register', 'store', 'create','home' ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::select('eventname','date', 'eventlimit','datestar','dateendevent');

        return view('eventoscrud.indexevento', compact('events'));
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


        dd($request->hasfile('picture'));
        
        Events::create([
            'eventname' => $request->get('eventname'),
            'picture' => $request->get('picture'),
            'eventdate' => $request->get('eventdate'),
            'eventlimit' => $request->get('eventlimit'),
            'datestar' => $request->get('datestar'),
            'dateendevent' => $request->get('dateendevent'),
            'Subjectevent' => $request->get('Subjectevent'),
        ]);

        session()->flash('success', 'Evento registrado correctamente!');
        return redirect(route('eventoscrud.indexevento'));
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
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Events $events)
    {
        //
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
