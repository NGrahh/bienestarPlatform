<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\TypeDocuments;
use App\Models\typeRh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'register', 'store', 'login', 'create', 'recuperarcontrasena','home' ]);
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
        $roles = Roles::where('name', '!=', 'Admin')->get();
        $type_documents = TypeDocuments::all();
        $type_rhs = typeRh::all();

        // Pasar los roles a la vista 'auth/register'
        return view('auth.register', ['roles' => $roles, 'type_documents' => $type_documents, 'type_rhs' => $type_rhs]);
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
            session(['name' => $user->name, 'lastname' => $user->lastname, 'email' => $user->email, 'rol_id' => $user->rol_id, ]);
            return redirect(route('home'));
        }

        // // Autenticación fallida, redirigir de vuelta al formulario de login con un mensaje de error.json_encode($credentials)
        session()->flash('error', 'Credenciales incorrectas.');
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
            'lastname' => 'required|string|between:2,100',
            'type_document_id' => 'required|string',
            'document' => 'required|numeric|unique:users|digits_between:8,15',
            'email' => 'required|string|email|max:100|unique:users',
            'type_rh_id' => 'required|string',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|string',
            'trainingProgram' => 'required_if:rol_id,5|string', // El programa de formación, sera solamente requerido cuando el rol escogido sea el numero 5, en este caso "Aprendiz"
            'yourToken' => 'required_if:rol_id,5|numeric|digits_between:8,12' // El numero de ficha, sera solamente requerido cuando el rol escogido sea el numero 5, en este caso "Aprendiz"

        ]);

        if ($validator->fails()) {
            return redirect(route('auth.registerform'))
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'user_name' => $this->setUserNameAttribute($request->get('name'), $request->get('lastname')),
            'type_document_id' => $request->get('type_document_id'),
            'document' => $request->get('document'),
            'email' => $request->get('email'),
            'type_rh_id' => $request->get('type_rh_id'),
            'password' => Hash::make($request->get('password')),
            'rol_id' => $request->get('rol_id'),
            'trainingProgram' => $request->get('trainingProgram'),
            'yourToken' => $request->get('yourToken')
        ]);

        $dataUser = ['name_user' => $request->get('name'), 'surnames_user' => $request->get('lastname')];
        Mail::send('emails.creacion-cuenta', $dataUser, function ($message) use ($request) {
            $message->from('bienestardlaprendiz@gmail.com', 'Nuevo Usuario');
            $message->to($request->get('email'))->subject('Notificación: creación de usuario');
        });

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

    public function setUserNameAttribute($name, $lastname)
    {
        // Obtiene las iniciales de nombre y apellido
        $nameInitials = strtolower(substr($name, 0, 3));
        $lastnameInitials = strtolower(substr($lastname, 0, 2));

        // Concatena las iniciales y las almacena en el campo user_name sin espacios
        return $nameInitials . $lastnameInitials;
    }

    // public function dimensionForm(){
    // $dimensions_types = TypeDimensions::all();
    // return view('formularios.form-appointment', ['type_dimensions' => $dimensions_types]);
    // }



}
