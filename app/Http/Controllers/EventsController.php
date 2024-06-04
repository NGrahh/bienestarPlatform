<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'home']);
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
}