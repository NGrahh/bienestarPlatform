<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\TypeDimensions;
use App\Models\typeDayTraining;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['mostrarVista','viewjornadas']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('formularios/eventos/list-events');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
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
        return view('formularios.form-appointment', compact('dimensions_types'));
    }
    
    public function showStudyTime()
    {
        $days_training=typeDayTraining::all(); 
        return view('formularios.form-inscription-event', compact('days_training'));
    }




}
