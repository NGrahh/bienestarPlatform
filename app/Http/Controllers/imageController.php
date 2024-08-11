<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imageController extends Controller
{

    public function store (Request $request){
        $image = new Image();
        // script para subir la imagen
        if($request->hasFile("image")){
        $fileName = md5(time().md5("j+'az;X<wab-wtp{.GP 9A0&<]zq:"));
        $ext= $request->file('image')->getClientOriginalExtension();
        $url = $request->file('image')->storeAs('image', $fileName.'.'.$ext, 'privates');
        $image->url = $url;
        $image->save();
        }
        $images = Image::all();
        return view('welcome', compact('images'));  
    }

    public function getImage($image){
        $path = storage_path('app/private/image/'.$image);
        return response()->file($path);
    }

}