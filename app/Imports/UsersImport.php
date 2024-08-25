<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UsersImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        DB::beginTransaction();

        try {
            $tipoDocumentoId = $this->obtenerTipoDocumento($row['tipo_documento']);
            $codigoContrasena = $this->generarCodigoContrasena();
            $rolUsuarioId = $this->obtenerTipoRol($row['rol']);
            $programaUsuario = $row['programa_de_formacion'] ? $this->obtenerProgramaFormacion($row['programa_de_formacion']) : null;
            $tipoRhUsuario = $this->obtenerTipoRH($row['tipo_sangre']);
            // Si 'tipo_dimension' no está en la fila o es nulo, se asigna null
            $tipoDimensionUsuario = !empty($row['tipo_dimension']) ? $this->obtenerDimensionUsuario($row['tipo_dimension']) : null;

            $user = User::create([
                'name' => $row['nombres'],
                'lastname' => $row['apellidos'],
                'user_name' => $this->setUserNameAttribute($row['nombres'], $row['apellidos']),
                'type_document_id' => $tipoDocumentoId,
                'type_dimensions_id' => $tipoDimensionUsuario,
                'document' => $row['numero_de_documento'],
                'email' => $row['correo'],
                'numberphone' => $row['telefono'],
                'type_rh_id' => $tipoRhUsuario,
                'rol_id' => $rolUsuarioId,
                'Program_id' => $programaUsuario,
                'yourToken' => $row['ficha'],
                'status' => true,
                'password' => Hash::make($codigoContrasena),
            ]);

            $dataUser = [
                'name_user' => $row['nombres'],
                'surnames_user' => $row['apellidos'],
                'password' => $codigoContrasena,
            ];

            Mail::send('emails.creacion-cuenta', $dataUser, function ($message) use ($user) {
                $message->from('bienestardlaprendiz@gmail.com', 'Nuevo Usuario');
                $message->to($user->email)->subject('Notificación: Creación de usuario');
            });

            DB::commit();

            return $user;
        } catch (ValidationException $e) {
            $errores = $e->validator->errors();
            $erroresDetallados = [];
            foreach ($errores->messages() as $campo => $mensaje) {
                $erroresDetallados[] = "Error en el campo '$campo': " . implode(', ', $mensaje);
            }
            $erroresDetallados = implode(' | ', $erroresDetallados);
            throw new \Exception("Errores de validación en la fila: {$erroresDetallados}");
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error al procesar la fila: " . $e->getMessage());
        }
    }

    public function rules(): array
    {
        return [
            'nombres' => 'required|string|between:2,100',
            'apellidos' => 'required|string|between:2,100',
            'tipo_documento' => 'required|string',
            'numero_de_documento' => 'required|numeric|digits_between:8,15|unique:users,document',
            'correo' => 'required|string|email|max:100|unique:users,email',
            'telefono' => 'required|numeric|digits_between:8,15|unique:users,numberphone',
            'rol' => 'required|string',
            'programa_de_formacion' => 'required_if:rol,5|string',
            'ficha' => 'required_if:rol,5|numeric|digits_between:7,12',
            'tipo_sangre' => 'required|string',
            'tipo_dimension' => 'nullable|string',
        ];
    }

    private function generarCodigoContrasena()
    {
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    }

    private function setUserNameAttribute($name, $lastname)
    {
        $nameInitials = strtolower(substr($name, 0, 3));
        $lastnameInitials = strtolower(substr($lastname, 0, 2));

        return $nameInitials . $lastnameInitials;
    }

    private function obtenerTipoDocumento($tipoDocumento)
    {
        $id = DB::table('type_documents')
            ->where('name', $tipoDocumento)
            ->value('id');

        if ($id === null) {
            throw new \Exception("Tipo de documento no encontrado: " . $tipoDocumento);
        }

        return $id;
    }

    private function obtenerTipoRol($rolUsuario)
    {
        $id = DB::table('roles')
            ->where('name', $rolUsuario)
            ->value('id');

        if ($id === null) {
            throw new \Exception("Rol de usuario no encontrado: " . $rolUsuario);
        }

        return $id;
    }

    private function obtenerProgramaFormacion($programaUsuario)
    {
        $id = DB::table('programas')
            ->where('name', $programaUsuario)
            ->value('id');

        if ($id === null) {
            throw new \Exception("Programa de formación no encontrado: " . $programaUsuario);
        }

        return $id;
    }

    private function obtenerTipoRH($tipoRh)
    {
        $id = DB::table('type_rhs')
            ->where('name', $tipoRh)
            ->value('id');

        if ($id === null) {
            throw new \Exception("Tipo de RH no encontrado: " . $tipoRh);
        }

        return $id;
    }

    private function obtenerDimensionUsuario($tipoDimensions)
    {
        $id = DB::table('type_dimensions')
            ->where('name', $tipoDimensions)
            ->value('id');

        if ($id === null) {
            throw new \Exception("Dimensión del usuario no encontrada: " . $tipoDimensions);
        }

        return $id;
    }
}
