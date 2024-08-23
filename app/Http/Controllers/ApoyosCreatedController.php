<?php

namespace App\Http\Controllers;

use App\Models\Apoyos;
use App\Models\Apoyos_created;
use App\Models\tipos_apoyos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApoyosCreatedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'update', 'destroy', 'store', 'create', 'Ap_fic', 'Ap_alimentacion', 'Ap_datos', ' Ap_sostenimiento', 'Ap_transporte']);
    }

    public function store_user(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'apoyo_id' => 'required|exists:apoyos_createds,id',
            'formatuser' => 'required|file|mimes:pdf,doc,docx',
            'photocopy' => 'required|image|mimes:jpeg,png,jpg,gif',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif',
            'sisben' => 'required|image|mimes:jpeg,png,jpg,gif',
            'support' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Manejo de archivos
        $formatuserPath = $this->uploadFile($request, 'formatuser', 'public/files/apoyoimg/archivos');
        $photocopyPath = $this->uploadFile($request, 'photocopy', 'public/files/apoyoimg/imgs');
        $receiptPath = $this->uploadFile($request, 'receipt', 'public/files/apoyoimg/imgs');
        $sisbenPath = $this->uploadFile($request, 'sisben', 'public/files/apoyoimg/imgs');
        $supportPath = $this->uploadFile($request, 'support', 'public/files/apoyoimg/imgs');
    
        // Creación del registro
        Apoyos::create([
            'apoyo_id' =>  $validatedData['apoyo_id'],
            'user_id' =>  auth()->id(),
            'formatuser' => $formatuserPath,
            'photocopy' => $photocopyPath,
            'receipt' => $receiptPath,
            'sisben' => $sisbenPath,
            'support' => $supportPath,
        ]);
    
        // Redirección o respuesta
        return redirect()->route('apoyos-sostenimiento')->with('success', 'Datos guardados correctamente.');
    }

    private function uploadFile(Request $request, $fieldName, $destination)
    {
        if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
            $fileName = time() . '_' . $request->file($fieldName)->getClientOriginalName();
            $request->file($fieldName)->storeAs( $destination, $fileName);
            return $fileName;
        }
    
        return null;
    }

    public function index()
    {
        // Carga las aperturas de inscripciones junto con sus inscripciones y tipo de apoyo
        $apoyos_created = Apoyos_created::with(['tipoApoyo'])->get();
    
        // Carga todos los tipos de apoyos
        $tipos_apoyos = tipos_apoyos::all();
        $apoyos_datos = Apoyos::all();
        // Devuelve la vista con los datos
        return view('apoyosCCcrud.apoyosCC', compact('apoyos_created', 'tipos_apoyos','apoyos_datos'));
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
            'appoiment_date_start' => 'required|date|after_or_equal:today',
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
    
        // Obtiene el usuario autenticado
        $user = Auth::user();
    
        // Verifica si el apoyo y el usuario están disponibles
        $inscrito = false;
        if ($apoyo && $user) {
            // Verifica si el usuario ya está inscrito en este apoyo
            $inscrito = Apoyos::where('apoyo_id', $apoyo->id)
                            ->where('user_id', $user->id)
                            ->exists();
        }
    
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
                'inscrito' => $inscrito,
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
                'inscrito' => $inscrito,
            ]);
        }
    }

    public function Ap_alimentacion()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 2)->first();
    
        // Obtiene el usuario autenticado
        $user = Auth::user();
    
        // Verifica si el apoyo y el usuario están disponibles
        $inscrito = false;
        if ($apoyo && $user) {
            // Verifica si el usuario ya está inscrito en este apoyo
            $inscrito = Apoyos::where('apoyo_id', $apoyo->id)
                            ->where('user_id', $user->id)
                            ->exists();
        }
    
        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');
    
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
                'inscrito' => $inscrito,
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
                'inscrito' => $inscrito, // No puede estar inscrito si no hay apoyo
            ]);
        }
    }

    public function Ap_datos()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 3)->first();

        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');
        // Obtiene el usuario autenticado
        $user = Auth::user();
        $inscrito = false;
        if ($apoyo && $user) {
            // Verifica si el usuario ya está inscrito en este apoyo
            $inscrito = Apoyos::where('apoyo_id', $apoyo->id)
                            ->where('user_id', $user->id)
                            ->exists();
        }


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
                'inscrito' => $inscrito,
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
                'inscrito' => $inscrito,
            ]);
        }
    }

    public function Ap_sostenimiento()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 4)->first();
        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');
        // Obtiene el usuario autenticado
        $user = Auth::user();
        $inscrito = false;
        if ($apoyo && $user) {
            // Verifica si el usuario ya está inscrito en este apoyo
            $inscrito = Apoyos::where('apoyo_id', $apoyo->id)
                            ->where('user_id', $user->id)
                            ->exists();
        }
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
                'inscrito' => $inscrito,
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
                'inscrito' => $inscrito,
            ]);
        }
    }

    public function Ap_transporte()
    {
        // Recupera un solo modelo basado en la condición
        $apoyo = Apoyos_created::where('tipo_apoyo_id', 5)->first();

        // Establece la zona horaria a Colombia
        $fechaActual = \Carbon\Carbon::now('America/Bogota');
        // Obtiene el usuario autenticado
        $user = Auth::user();
        $inscrito = false;
        if ($apoyo && $user) {
            // Verifica si el usuario ya está inscrito en este apoyo
            $inscrito = Apoyos::where('apoyo_id', $apoyo->id)
                            ->where('user_id', $user->id)
                            ->exists();
        }
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
                'inscrito' => $inscrito,
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
                'inscrito' => $inscrito,
            ]);
        }
    }

    public function formulario_p($apoyo_id)
    {
        // Recupera el apoyo por ID
        $apoyo = Apoyos_created::findOrFail($apoyo_id);
        
        // Obtiene el usuario autenticado
        $user = Auth::user();
        
        // Verifica si el usuario ya está inscrito en este apoyo
        $inscrito = Apoyos::where('apoyo_id', $apoyo_id)
                            ->where('user_id', $user->id)
                            ->exists();
        
        // Retorna la vista con los datos necesarios
        return view('formularios.apoyos.form-inscription-supports', [
            'apoyo_id' => $apoyo_id,
            'user' => $user,
            'inscrito' => $inscrito
        ]);
    }

    public function getFile($category, $filename)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }
    
        // Define las rutas para archivos y para imágenes
        $paths = [
            'archivos' => 'public/files/apoyoimg/archivos',
            'imgs' => 'public/files/apoyoimg/imgs',
        ];
    
        // Verifica si la categoría es válida
        if (!array_key_exists($category, $paths)) {
            abort(404, 'Category not found');
        }
    
        // Define la ruta base según la categoría
        $path = $paths[$category];
    
        // Verifica si el archivo existe
        if (Storage::exists($path . '/' . $filename)) {
            // Detecta el tipo de archivo
            $mimeType = Storage::mimeType($path . '/' . $filename);
    
            // Devuelve el archivo con el encabezado Content-Disposition configurado para inline
            return Storage::response($path . '/' . $filename, $filename, [
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'Content-Type' => $mimeType
            ]);
        } else {
            // Retorna un error 404 si el archivo no existe
            abort(404, 'File not found');
        }
    }

}