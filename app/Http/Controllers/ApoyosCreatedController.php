<?php

namespace App\Http\Controllers;

use App\Models\Apoyos;
use App\Models\Apoyos_created;
use App\Models\tipos_apoyos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApoyosCreatedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'Ap_fic', 'Ap_alimentacion', 'Ap_datos', ' Ap_sostenimiento', 'Ap_transporte']);
    }

    public function store_user(Request $request)
    {
        // Definir reglas de validación para los campos del formul+ario.
        $rules = [
            'id' => 'required|exists:users,id', // Asegúrate de que 'apoyo_id' esté validado
            'apoyo_id' => 'required|exists:apoyos_createds,id', // Asegúrate de que 'apoyo_id' esté validado
            'mobilenumber' => 'required|numeric|digits_between:7,12', // Número de móvil obligatorio, numérico y con longitud entre 7 y 12 dígitos.
            'formatuser' => 'required|file|mimes:doc,docx,pdf|max:2048', // Archivo obligatorio con extensión doc, docx o pdf y tamaño máximo de 2048 KB.
            'photocopy' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'receipt' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'sisben' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen obligatoria con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
            'support' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Imagen opcional con extensión jpg, png, jpeg o gif y tamaño máximo de 2048 KB.
        ];
        // dd($request->all());
        // Validar la petición según las reglas definidas.
        $validator = Validator::make($request->all(), $rules);

        // Si la validación falla, redirige de vuelta al formulario con los errores y los datos introducidos por el usuario.
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Existe un error en el formulario.');
        }

        // Manejar el archivo 'formatuser' (Word o PDF).
        $formatuserPath = null;
        if ($request->file('formatuser')->isValid()) {
            $file = $request->file('formatuser');
            // Mueve el archivo a la carpeta pública 'images/archivos' y guarda el nombre del archivo.
            $formatuserPath = $file->storeAs('images/archivos', $file->getClientOriginalName(), 'public');
        } else {
            return redirect()->back()->withInput()->with('error', 'El archivo formatuser no es válido.');
        }

        // Array para almacenar los nombres de las imágenes.
        $imageNames = [];

        // Procesa cada archivo de imagen (si existe).
        foreach (['photocopy', 'receipt', 'sisben', 'support'] as $file) {
            if ($request->hasFile($file)) {
                $image = $request->file($file);
                // Genera un nombre único para el archivo usando el tiempo actual y la extensión del archivo.
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Mueve la imagen a la carpeta pública 'images/apoyos'.
                $image->storeAs('images/apoyos', $imageName, 'public');
                // Guarda el nombre del archivo en el array.
                $imageNames[$file] = $imageName;
            }
        }

        // Crear un nuevo registro en la base de datos con los datos del formulario.
        $apoyo = Apoyos::create([
            'id' => $request->input('id'), // Asegúrate de incluir el campo 'apoyo_id'
            'apoyo_id' => $request->input('apoyo_id'), // Asegúrate de incluir el campo 'apoyo_id'
            'user_id' => auth()->id(), // Obtiene el ID del usuario autenticado.
            'mobilenumber' => $request->input('mobilenumber'), // Número de móvil del formulario.
            'formatuser' => $formatuserPath, // Ruta del archivo Word o PDF.
            'photocopy' => $imageNames['photocopy'] ?? null, // Nombre de la imagen 'photocopy' o null si no se subió.
            'receipt' => $imageNames['receipt'] ?? null, // Nombre de la imagen 'receipt' o null si no se subió.
            'sisben' => $imageNames['sisben'] ?? null, // Nombre de la imagen 'sisben' o null si no se subió.
            'support' => $imageNames['support'] ?? null, // Nombre de la imagen 'support' o null si no se subió.
        ]);

        // Establece un mensaje de éxito en la sesión y redirige a la ruta 'form-inscription-supports'.
        session()->flash('success', 'Inscripción exitosa.');
        return redirect()->route('formulario_p', ['apoyo_id' => $apoyo->apoyo_id]);
    }

    public function index()
    {
        // Obtiene todos los registros de la tabla 'Apoyos_created'
        $apoyos_created = Apoyos_created::with('tipoApoyo')->get(); // Asegúrate de cargar la relación si es necesario

        // Obtiene todos los registros de la tabla 'tipos_apoyos'
        $tipos_apoyos = tipos_apoyos::all();
        // Devuelve la vista 'apoyosCCcrud.apoyosCC' con la variable 'apoyos_created' disponible para la vista.
        // 'compact' crea un array asociativo con la variable 'apoyos_created' para pasarla a la vista.
        return view('apoyosCCcrud.apoyosCC', compact('apoyos_created', 'tipos_apoyos'));
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario usando Validator
        $validator = Validator::make($request->all(), [
            'tipo_apoyo_id' => 'required|exists:tipos_apoyos,id',
            'appoiment_date_start' => 'required|date|after_or_equal:today',
            'appoiment_date_end' => 'required|date|after_or_equal:appoiment_date_start',
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Verifica los datos ingresados!');
        }

        $validatedData = $validator->validated();

        // Verificar si ya existe una inscripción con el mismo tipo de apoyo
        $existingApoyo = Apoyos_created::where('tipo_apoyo_id', $validatedData['tipo_apoyo_id'])
            ->where('status', 1)
            ->first();

        if ($existingApoyo) {
            return redirect()->back()->withErrors(['tipo_apoyo_id' => 'Este tipo de apoyo ya está abierto con un estado de 0.']);
        }

        // Crear una nueva entrada en la base de datos
        Apoyos_created::create([
            'tipo_apoyo_id' => $validatedData['tipo_apoyo_id'],
            'appoiment_date_start' => $validatedData['appoiment_date_start'],
            'appoiment_date_end' => $validatedData['appoiment_date_end'],
            'status' => 1, // Asumiendo que el nuevo estado es 1
        ]);

        // Redirigir o devolver una respuesta
        return redirect()->route('apoyosCreated.index')->with('success', 'Apoyo creado exitosamente.');
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo_apoyo_id' => 'required|exists:tipos_apoyos,id',
            'appoiment_date_start' => [
                'required',
                'date_format:Y-m-d', // Formato de fecha requerido
                // Validación personalizada para asegurar que la fecha no sea en el pasado
                function ($attribute, $value, $fail) {
                    $today = now()->format('Y-m-d');
                    if ($value < $today) {
                        $fail('La fecha ingresada debe ser hoy o una fecha futura.');
                    }
                },
            ],
            'appoiment_date_end' => 'required|date|after_or_equal:appoiment_date_start',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Verifica los datos ingresados!');
        }
    
        $validatedData = $validator->validated();
    
        // Buscar el apoyo a actualizar
        $apoyo = Apoyos_created::findOrFail($id);
    
        // Actualizar el registro en la base de datos
        $apoyo->update([
            'tipo_apoyo_id' => $validatedData['tipo_apoyo_id'],
            'appoiment_date_start' => $validatedData['appoiment_date_start'],
            'appoiment_date_end' => $validatedData['appoiment_date_end'],
        ]);
    
        return redirect()->route('apoyosCreated.index')->with('success', 'Apoyo actualizado exitosamente.');
    }
    
    public function show($id)
    {
        // Busca el registro en la tabla 'Apoyos_created' con el ID proporcionado.
        // Si no se encuentra el registro, lanza una excepción 'ModelNotFoundException' que
        // mostrará una página 404.
        $apoyos_created = Apoyos_created::findOrFail($id);

        // Devuelve la vista 'apoyos_created.show' con la variable 'apoyos_created' disponible para la vista.
        // 'compact' crea un array asociativo con la variable 'apoyos_created' para pasarla a la vista.
        return view('apoyos_created.show', compact('apoyos_created'));
    }

    public function disable($id)
    {
        // Busca el registro en la tabla 'Apoyos_created' utilizando el ID proporcionado.
        $apoyos_created = Apoyos_created::findOrFail($id);

        // Si el estado actual es 0 (inactivo), se cambia a 1 (activo).
        // Si el estado actual es 1 (activo), se cambia a 0 (inactivo).
        $newStatus = $apoyos_created->status == 0 ? 1 : 0;

        // Verifica si el apoyo puede ser habilitado (estado nuevo es 1)
        if ($newStatus == '1' && now()->greaterThan($apoyos_created->appoiment_date_end)) {
            // Si la fecha final de inscripción ha pasado, no se puede habilitar.
            return redirect()->back()->withErrors(['date' => 'No se puede habilitar el apoyo después de la fecha final de inscripción.']);
        }

        // Verifica si ya existe una inscripción con el mismo tipo de apoyo y estado 1
        $existingApoyo = Apoyos_created::where('tipo_apoyo_id', $apoyos_created->tipo_apoyo_id)
            ->where('status', '1') // Asegúrate de que el status sea 1
            ->where('id', '!=', $apoyos_created->id) // Excluye el registro actual
            ->first();

        if ($existingApoyo && $newStatus == '1') {
            return redirect()->back()->withErrors(['tipo_apoyo_id' => 'Este tipo de apoyo ya está habilitado.']);
        }

        // Actualiza el campo 'status' en la base de datos con el nuevo valor.
        $apoyos_created->update(['status' => $newStatus]);

        // Genera un mensaje de éxito basado en el nuevo estado.
        $message = $newStatus ? 'Apoyo habilitado correctamente.' : 'Apoyo deshabilitado correctamente.';

        // Redirige al usuario a la vista de índice de 'apoyosCreated' con un mensaje de éxito en la sesión.
        return redirect()->route('apoyosCreated.index')->with('success', $message);
    }

    public function Ap_fic()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 1)->first();
        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');

        // Verifica si el modelo fue encontrado
        if ($apoyo) {
            // Define las fechas de apertura y clausura con hora
            $fechaApertura = \Carbon\Carbon::parse($apoyo->appoiment_date_start . ' 00:00:00', 'America/Bogota');
            $fechaClausura = \Carbon\Carbon::parse($apoyo->appoiment_date_end . ' 23:59:59', 'America/Bogota');

            // Determina si el botón debe mostrarse
            $mostrarBoton = ($fechaActual->greaterThanOrEqualTo($fechaApertura) && $fechaActual->lessThanOrEqualTo($fechaClausura));

            // Pasa los datos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-fic', [
                'apoyo_id' => $apoyo->id,
                'status' => $apoyo->status,
                'tipo_apoyo_id' => $apoyo->tipo_apoyo_id,
                'fecha_apertura' => $fechaApertura->format('Y-m-d H:i:s'),
                'fecha_clausura' => $fechaClausura->format('Y-m-d H:i:s'),
                'mostrarBoton' => $mostrarBoton,
            ]);
        } else {
            // Si el registro no existe, pasar datos vacíos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-fic', [
                'apoyo_id' => null,
                'status' => null,
                'tipo_apoyo_id' => null,
                'fecha_apertura' => null,
                'fecha_clausura' => null,
                'mostrarBoton' => false,
            ]);
        }
    }

    public function Ap_alimentacion()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 2)->first();
        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');

        // Verifica si el modelo fue encontrado
        if ($apoyo) {
            // Define las fechas de apertura y clausura con hora
            $fechaApertura = \Carbon\Carbon::parse($apoyo->appoiment_date_start . ' 00:00:00', 'America/Bogota');
            $fechaClausura = \Carbon\Carbon::parse($apoyo->appoiment_date_end . ' 23:59:59', 'America/Bogota');

            // Determina si el botón debe mostrarse
            $mostrarBoton = ($fechaActual->greaterThanOrEqualTo($fechaApertura) && $fechaActual->lessThanOrEqualTo($fechaClausura));

            // Pasa los datos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-alimentacion', [
                'apoyo_id' => $apoyo->id,
                'status' => $apoyo->status,
                'tipo_apoyo_id' => $apoyo->tipo_apoyo_id,
                'fecha_apertura' => $fechaApertura->format('Y-m-d H:i:s'),
                'fecha_clausura' => $fechaClausura->format('Y-m-d H:i:s'),
                'mostrarBoton' => $mostrarBoton,
            ]);
        } else {
            // Si el registro no existe, pasar datos vacíos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-alimentacion', [
                'apoyo_id' => null,
                'status' => null,
                'tipo_apoyo_id' => null,
                'fecha_apertura' => null,
                'fecha_clausura' => null,
                'mostrarBoton' => false,
            ]);
        }
    }

    public function Ap_datos()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 3)->first();

        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');

        // Verifica si el modelo fue encontrado
        if ($apoyo) {
            // Define las fechas de apertura y clausura con hora
            $fechaApertura = \Carbon\Carbon::parse($apoyo->appoiment_date_start . ' 00:00:00', 'America/Bogota');
            $fechaClausura = \Carbon\Carbon::parse($apoyo->appoiment_date_end . ' 23:59:59', 'America/Bogota');

            // Determina si el botón debe mostrarse
            $mostrarBoton = ($fechaActual->greaterThanOrEqualTo($fechaApertura) && $fechaActual->lessThanOrEqualTo($fechaClausura));

            // Pasa los datos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-datos', [
                'apoyo_id' => $apoyo->id,
                'status' => $apoyo->status,
                'tipo_apoyo_id' => $apoyo->tipo_apoyo_id,
                'fecha_apertura' => $fechaApertura->format('Y-m-d H:i:s'),
                'fecha_clausura' => $fechaClausura->format('Y-m-d H:i:s'),
                'mostrarBoton' => $mostrarBoton,
            ]);
        } else {
            // Si el registro no existe, pasar datos vacíos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-datos', [
                'apoyo_id' => null,
                'status' => null,
                'tipo_apoyo_id' => null,
                'fecha_apertura' => null,
                'fecha_clausura' => null,
                'mostrarBoton' => false,
            ]);
        }
    }

    public function Ap_sostenimiento()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 4)->first();
        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');

        // Verifica si el modelo fue encontrado
        if ($apoyo) {
            // Define las fechas de apertura y clausura con hora
            $fechaApertura = \Carbon\Carbon::parse($apoyo->appoiment_date_start . ' 00:00:00', 'America/Bogota');
            $fechaClausura = \Carbon\Carbon::parse($apoyo->appoiment_date_end . ' 23:59:59', 'America/Bogota');

            // Determina si el botón debe mostrarse
            $mostrarBoton = ($fechaActual->greaterThanOrEqualTo($fechaApertura) && $fechaActual->lessThanOrEqualTo($fechaClausura));

            // Pasa los datos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-regular', [
                'apoyo_id' => $apoyo->id,
                'status' => $apoyo->status,
                'tipo_apoyo_id' => $apoyo->tipo_apoyo_id,
                'fecha_apertura' => $fechaApertura->format('Y-m-d H:i:s'),
                'fecha_clausura' => $fechaClausura->format('Y-m-d H:i:s'),
                'mostrarBoton' => $mostrarBoton,
            ]);
        } else {
            // Si el registro no existe, pasar datos vacíos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-regular', [
                'apoyo_id' => null,
                'status' => null,
                'tipo_apoyo_id' => null,
                'fecha_apertura' => null,
                'fecha_clausura' => null,
                'mostrarBoton' => false,
            ]);
        }
    }

    public function Ap_transporte()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 5)->first();

        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');

        // Verifica si el modelo fue encontrado
        if ($apoyo) {
            // Define las fechas de apertura y clausura con hora
            $fechaApertura = \Carbon\Carbon::parse($apoyo->appoiment_date_start . ' 00:00:00', 'America/Bogota');
            $fechaClausura = \Carbon\Carbon::parse($apoyo->appoiment_date_end . ' 23:59:59', 'America/Bogota');

            // Determina si el botón debe mostrarse
            $mostrarBoton = ($fechaActual->greaterThanOrEqualTo($fechaApertura) && $fechaActual->lessThanOrEqualTo($fechaClausura));

            // Pasa los datos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-transporte', [
                'apoyo_id' => $apoyo->id,
                'status' => $apoyo->status,
                'tipo_apoyo_id' => $apoyo->tipo_apoyo_id,
                'fecha_apertura' => $fechaApertura->format('Y-m-d H:i:s'),
                'fecha_clausura' => $fechaClausura->format('Y-m-d H:i:s'),
                'mostrarBoton' => $mostrarBoton,
            ]);
        } else {
            // Si el registro no existe, pasar datos vacíos a la vista
            return view('layouts.descripcion-apoyos.Apoyo-transporte', [
                'apoyo_id' => null,
                'status' => null,
                'tipo_apoyo_id' => null,
                'fecha_apertura' => null,
                'fecha_clausura' => null,
                'mostrarBoton' => false,
            ]);
        }
    }

    public function formulario_p($apoyo_id)
    {
        // Opcionalmente, valida el ID o recupera el modelo si es necesario
        $apoyo = Apoyos_created::findOrFail($apoyo_id);
        $user = Auth::user(); // Obtiene el usuario autenticado
        // dd($apoyo_id); // Esto mostrará el valor del apoyo_id y detendrá la ejecución
        return view('formularios.apoyos.form-inscription-supports', ['apoyo_id' => $apoyo_id], compact('user'));
    }
}
