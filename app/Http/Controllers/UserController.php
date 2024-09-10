<?php

namespace App\Http\Controllers;

// Laravel Framework imports
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

// Model imports
use App\Models\Roles;
use App\Models\TypeDimensions;
use App\Models\TypeDocuments;
use App\Models\typeRh;
use App\Models\User;
use App\Models\Programas;

// Import Excel's
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;



class UserController extends Controller
{
    // La función __construct() en el código proporcionado configura el middleware 'auth' para aplicarse a todas las rutas 
    // del controlador donde se encuentra este constructor. Sin embargo, excluye ciertas rutas específicas de la aplicación del middleware 
    // 'auth'. Las rutas excluidas son index, show, update, destroy, register, store, login, create, recuperarcontrasena, home y disable. 
    // Esto significa que todas las rutas de este controlador estarán protegidas por autenticación, 
    // excepto las mencionadas anteriormente, que probablemente sean accesibles públicamente o requieran una lógica de acceso diferente

    public function __construct()
    {
        // Aplica el middleware 'auth' a todas las rutas de este controlador,excepto a las que se enumeran en el arreglo 'except'.
        $this->middleware('auth')->except(['index','show','update','destroy', 'register', 'store', 'login', 'create', 'recuperarcontrasena','home','disable' ]);
    }

    //  Esta función prepara datos esenciales relacionados con usuarios, roles, tipos de documentos, programas y tipos de sangre, se seleccionan
    //  desde la base de datos y los envía a la vista crud.index para su visualización y posible manipulación o presentación en la interfaz de usuario

    public function index()
    {
        $users = User::select('users.id', 'name', 'lastname', 'document', 'email', 'type_document_id','type_dimensions_id', 'rol_id', 'type_rh_id','numberphone','Program_id','yourToken','status')->with('role')->with('TypeDocument')->orderBy('users.id')->get();
        $roles = Roles::where('name', '!=', 'Admin')->get();
        $type_documents = TypeDocuments::all();
        $programas = Programas::all();
        $type_rhs = typeRh::all();
        $type_dimensions = TypeDimensions::all();

        return view('crud.index', ['user' => $users, 'roles' => $roles, 'type_documents' => $type_documents, 'type_rhs' => $type_rhs, 'programas' => $programas ,'type_dimensions'=>$type_dimensions], compact('users'));
    }

    // Esta función prepara datos relacionados con roles, tipos de documentos, programas y tipos de sangre, se seleccionan desde la base de datos
    // y los envía a la vista auth.register, la cual es utilizada para mostrar un formulario de registro 
    // donde el administrador puede seleccionar opciones específicas relacionadas con el perfil y atributos de registro

    public function register()
    {
        $roles = Roles::where('name', '!=', 'Admin')->get();
        $type_documents = TypeDocuments::all();
        $programas = Programas::all();
        $type_rhs = typeRh::all();

        // Pasar los roles a la vista 'auth/register'
        return view('auth.register', ['roles' => $roles, 'type_documents' => $type_documents, 'type_rhs' => $type_rhs, 'programas' => $programas]);
    }

    // Esta función maneja el proceso de inicio de sesión, validando las credenciales del usuario, intentando autenticar, y 
    // almacenando información relevante en la sesión si la autenticación es exitosa. 
    // Además, maneja la redirección adecuada en caso de éxito o fracaso en la autenticación
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (AuthFacade::attempt($credentials)) {
            $user = AuthFacade::user();

            // Verificar el estado del usuario antes de permitir la sesión
            if (!$user->status) {
                AuthFacade::logout(); // Cerrar sesión si el usuario no está activo
                session()->flash('error', 'Su cuenta está deshabilitada. Contacte al administrador.'); // Mensaje de error
                return redirect(route('auth.login')); // Redirigir de vuelta al formulario de inicio de sesión
            }

            // Almacenar el nombre, apellido, correo electrónico y rol en la sesión
            session(['name' => $user->name, 'lastname' => $user->lastname, 'email' => $user->email, 'rol_id' => $user->rol_id]);

                   // Redirigir a la página original o a la página principal si no hay una página original
            return redirect()->intended(route('home'));
        }

        // Autenticación fallida, redirigir de vuelta al formulario de login con un mensaje de error
        session()->flash('error', 'Credenciales incorrectas.');
        return redirect(route('auth.login'));
    }

    public function create()
    {
        return view('lider.eventos.prueba');
    }

    function generarCodigoContrasena() {
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    }

    // La función se encarga de validar, almacenar en la base de datos, notificar por correo electrónico 
    // y manejar el flujo de redirección y mensajes para el proceso de registro de un nuevo usuario en la aplicación

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Información personal
            'name' => 'required|string|between:2,100',
            'lastname' => 'required|string|between:2,100',
            
            // Identificación
            'type_document_id' => 'required|string',
            'type_dimensions_id' => 'nullable|string',
            'document' => 'required|numeric|unique:users|digits_between:8,15',
            
            // Contacto
            'email' => 'required|string|email|max:100|unique:users',
            'numberphone' => 'required|numeric|unique:users|digits_between:8,15',
            
            // Información adicional
            'type_rh_id' => 'required|string',
            'rol_id' => 'required|string',
            
            // Campos condicionales
            'Program_id' => 'required_if:rol_id,5|string',
            'yourToken' => 'required_if:rol_id,5|numeric|digits_between:7,12'
        ], [
            // Mensajes personalizados
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.between' => 'El campo nombre debe tener entre 2 y 100 caracteres.',
            
            'lastname.required' => 'El campo apellido es obligatorio.',
            'lastname.string' => 'El campo apellido debe ser una cadena de texto.',
            'lastname.between' => 'El campo apellido debe tener entre 2 y 100 caracteres.',
            
            'type_document_id.required' => 'El tipo de documento es obligatorio.',
            'type_document_id.string' => 'El tipo de documento debe ser una cadena de texto.',
            
            'type_dimensions_id.string' => 'El campo tipo de dimensión debe ser una cadena de texto.',
            
            'document.required' => 'El número de documento es obligatorio.',
            'document.numeric' => 'El número de documento debe ser numérico.',
            'document.unique' => 'El número de documento ya está registrado.',
            'document.digits_between' => 'El número de documento debe tener entre 8 y 15 dígitos.',
            
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico no tiene un formato válido.',
            'email.max' => 'El correo electrónico no puede exceder los 100 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            
            'numberphone.required' => 'El número de teléfono es obligatorio.',
            'numberphone.numeric' => 'El número de teléfono debe ser numérico.',
            'numberphone.unique' => 'El número de teléfono ya está registrado.',
            'numberphone.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
            
            'type_rh_id.required' => 'El tipo de RH es obligatorio.',
            'type_rh_id.string' => 'El tipo de RH debe ser una cadena de texto.',
            
            'rol_id.required' => 'El campo rol es obligatorio.',
            'rol_id.string' => 'El campo rol debe ser una cadena de texto.',
            
            'Program_id.required_if' => 'El programa de formación es obligatorio cuando el rol es Aprendiz.',
            'Program_id.string' => 'El programa de formación debe ser una cadena de texto.',
            
            'yourToken.required_if' => 'El número de ficha es obligatorio cuando el rol es Aprendiz.',
            'yourToken.numeric' => 'El número de ficha debe ser numérico.',
            'yourToken.digits_between' => 'El número de ficha debe tener entre 7 y 12 dígitos.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.index')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Hubo un problema con uno de los campos. Por favor, verifica los datos ingresados.')
                ->with('modal_open')
                ->with('modal_reopen', true);
        }
        
        $codigoContrasena = $this->generarCodigoContrasena();
    
        User::create([
            // Información personal
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'user_name' => $this->setUserNameAttribute($request->get('name'), $request->get('lastname')),
            
            // Identificación
            'type_rh_id' => $request->get('type_rh_id'),
            'type_document_id' => $request->get('type_document_id'),
            'type_dimensions_id' => $request->get('type_dimensions_id'),
            'document' => $request->get('document'),
            
            // Contacto
            'email' => $request->get('email'),
            'numberphone' => $request->get('numberphone'),
            
            // Seguridad
            'password' => Hash::make($codigoContrasena),
            
            // Rol y programa
            'rol_id' => $request->get('rol_id'),
            'Program_id' => $request->get('Program_id'),
            'yourToken' => $request->get('yourToken'),
            
            // Estado
            'status' => true,
        ]);
    
        $dataUser = ['name_user' => $request->get('name'), 
                    'surnames_user' => $request->get('lastname'), 
                    'password' => $codigoContrasena ];
    
        Mail::send('emails.creacion-cuenta', $dataUser, function ($message) use ($request) {
            $message->from('bienestardlaprendiz@gmail.com', 'Nuevo Usuario');
            $message->to($request->get('email'))->subject('Notificación: Creación de usuario');
        });
    
        session()->flash('success', 'Usuario registrado correctamente!');
    
        return redirect(route('users.index'));
    }
    

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('crud.show', compact('user'));
    }

    // Esta función maneja el proceso de validación, actualización de datos y redirección para actualizar 
    // la información de un usuario específico en la aplicación, asegurando que los datos sean válidos y 
    // proporcionando retroalimentación adecuada en caso de errores o éxito en la operación de actualización
    public function update(Request $request, string $id)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'lastname' => 'required|string|between:2,100',
            'type_document_id' => 'required|string',
            'type_dimensions_id' => 'required_if:rol_id,4|string',
            'document' => 'required|numeric|unique:users,document,'.$id.'|digits_between:8,15',
            'email' => 'required|string|email|max:100|unique:users,email,'.$id,
            'type_rh_id' => 'required|string',
            'rol_id' => 'required|string',
            'Program_id' => 'required_if:rol_id,5|string',
            'yourToken' => 'required_if:rol_id,5|numeric|digits_between:7,12'
        ]);
    
        // Verificar si la validación falla
        if ($validator->fails()) {
            $user = User::findOrFail($id);
            $currentPage = $request->input('currentPage', 0);
            return redirect()->route('users.index')
                ->withErrors($validator)
                ->withInput()
                ->with('current_page', $currentPage)
                ->with('error', 'Hubo un problema con uno de los campos. Por favor, verifica los datos ingresados.')
                ->with('modal_open', $user->id)
                ->with('reopen_modal', true);
        }
    
        // Obtener el usuario que deseas actualizar
        $user = User::findOrFail($id);
    
        // Actualizar los campos del usuario con los datos del formulario, sin cambiar la contraseña ni el nombre de usuario
        $user->update([
            // Información personal
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            
            // Identificación
            'type_rh_id' => $request->get('type_rh_id'),
            'type_document_id' => $request->get('type_document_id'),
            'type_dimensions_id' => $request->get('type_dimensions_id'),
            'document' => $request->get('document'),
            
            // Contacto
            'email' => $request->get('email'),
            'numberphone' => $request->get('numberphone'),
            
            // Rol y programa
            'rol_id' => $request->get('rol_id'),
            'Program_id' => $request->get('Program_id'),
            'yourToken' => $request->get('yourToken'),
        ]);
    
        // Redireccionar a una página específica o retornar algún mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    
    // Esta función maneja la eliminación de un usuario específico de la base de datos y proporciona retroalimentación 
    // al usuario mediante un mensaje de éxito después de completar la operación de eliminación.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $users = User::select('users.id', 'name', 'lastname', 'document', 'email', 'type_document_id', 'rol_id','Program_id','yourToken')->with('role')->with('TypeDocument')->get();
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Esta función maneja la habilitación y deshabilitación de un usuario específico de la base de datos y proporciona retroalimentación 
    // al usuario mediante un mensaje de éxito después de completar la operación de habilitación y deshabilitación.

    public function disable($id)
    {
        // Encuentra el usuario por su ID o lanza una excepción si no existe
        $user = User::findOrFail($id);
        
        // Cambia el estado del usuario de activo a inactivo o viceversa
        $newStatus = !$user->status; // Cambia el estado al opuesto al actual
        
        // Actualiza el estado en la base de datos
        $user->update(['status' => $newStatus]);
        
        // Genera el mensaje de éxito basado en el nuevo estado
        $message = $newStatus ? 'Usuario habilitado correctamente.' : 'Usuario deshabilitado correctamente.';
        
        // Redirige de vuelta a la página de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', $message);
    }

    // EEsta función es responsable de cerrar la sesión de usuario, limpiar la sesión actual para eliminar cualquier dato persistente y 
    // redirigir al usuario a una página específica después de cerrar sesión, en este caso, la página de inicio de la aplicación (home).

    public function logout(Request $request)
    {
        AuthFacade::logout();

        $request->session()->flush();

        return redirect(route('home'));
    }


    // La función devuelve un string que consiste en las iniciales del nombre y apellido concatenadas, todo en minúsculas y sin espacios. 
    // Este valor sería luego almacenado en el atributo user_name del modelo de usuario cuando se asigne un nuevo valor a dicho atributo.

    public function setUserNameAttribute($name, $lastname)
    {
        // Obtiene las iniciales de nombre y apellido
        $nameInitials = strtolower(substr($name, 0, 3));
        $lastnameInitials = strtolower(substr($lastname, 0, 2));

        // Concatena las iniciales y las almacena en el campo user_name sin espacios
        return $nameInitials . $lastnameInitials;
    }


    public function importForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);
    
        try {
            Excel::import(new UsersImport, $request->file('file'));
    
            return redirect()->route('users.index')->with('success', 'Importación realizada con éxito.');
        } catch (\Throwable $e) {
            return redirect()->route('users.index')->with('error', 'Hubo un problema con el archivo: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Hubo un error inesperado: ' . $e->getMessage());
        }
    }
}