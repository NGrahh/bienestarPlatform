<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        try {
            $codigoContrasena = $this->generarCodigoContrasena();
            $user = User::create([
                'name' => $row[0],
                'lastname' => $row[1],
                'user_name' => $this->setUserNameAttribute($row[0], $row[1]),
                'type_document_id' => $row[2],
                'type_dimensions_id' => $row[3],
                'document' => $row[4],
                'email' => $row[5],
                'numberphone' => $row[6],
                'type_rh_id' => $row[7],
                'rol_id' => $row[8],
                'Program_id' => $row[9],
                'yourToken' => $row[10],
                'status' => true,
                'password' => Hash::make($codigoContrasena),
            ]);

            $dataUser = [
                'name_user' => $row[0],
                'surnames_user' => $row[1], 
                'password' => $codigoContrasena,
            ];

            Mail::send('emails.creacion-cuenta', $dataUser, function ($message) use ($user) {
                $message->from('bienestardlaprendiz@gmail.com', 'Nuevo Usuario');
                $message->to($user->email)->subject('Notificación: Creación de usuario');
            });

            return $user;
        } catch (\Exception $e) {
            // Manejo del error, puedes registrar el error o devolver un mensaje adecuado
            throw new \Exception("Error al procesar la fila: " . $e->getMessage());
        }
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string|between:2,100',
            '1' => 'required|string|between:2,100',
            '2' => 'required|numeric',
            '3' => 'required|numeric',
            '4' => 'required|numeric|digits_between:8,15|unique:users,document',
            '5' => 'required|string|email|max:100|unique:users,email',
            '6' => 'required|numeric|digits_between:8,15|unique:users,numberphone',
            '7' => 'required|numeric',
            '8' => 'required|numeric',
            '9' => 'required_if:8,5|numeric',
            '10' => 'required_if:8,5|numeric|digits_between:7,12',
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
}