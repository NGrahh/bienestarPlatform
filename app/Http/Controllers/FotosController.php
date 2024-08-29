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
}
