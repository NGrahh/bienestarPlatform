<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FotosController extends Controller
{
    public function show($filename)
    {
        $path = public_path('img/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
        return Response::file($path);
    }


    public function show_equipo($filename)
    {
        $path = public_path('assets/img/Bienestar/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
            // Debugging line
        return Response::file($path);
    }


    public function show_perfil($filename)
    {
        $path = public_path('images/profile/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
            // Debugging line
        return Response::file($path);
    }








    public function show_apoyos($filename)
    {
        $path = public_path('imagenesApoyos/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
            // Debugging line
        return Response::file($path);
    }

}