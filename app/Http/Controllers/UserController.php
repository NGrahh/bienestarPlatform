<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'register', 'store', 'login', 'create']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register()
    {
        // Obtener todos los roles de la base de datos
        $roles = Roles::all();

        // Pasar los roles a la vista 'auth/register'
        return view('auth.register', ['roles' => $roles]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (AuthFacade::attempt($credentials)) {
            $user = AuthFacade::user();

            // Almacenar el nombre y el correo electrónico en la sesión
            session(['name' => $user->name, 'email' => $user->email, 'rol_id' => $user->rol_id]);
            return redirect(route('welcome'));
        }

        // Autenticación fallida, redirigir de vuelta al formulario de login con un mensaje de error
        session()->flash('error', 'Credenciales incorrectas!!');
        return redirect(route('auth.login'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lider.eventos.prueba');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'type_document' => 'required|string',
            'document' => 'required|numeric|unique:users|digits_between:10,12',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('auth.registerform'))
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'document' => $request->get('document'),
            'type_document' => $request->get('type_document'),
            'password' => Hash::make($request->get('password')),
        ]);

        session()->flash('success', 'Usuario registrado correctamente!');

        return redirect(route('auth.login'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        AuthFacade::logout();

        $request->session()->flush();

        return redirect(route('auth.login'));
    }
}
