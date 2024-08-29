<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{


    public function index(){
        // Obtener todas las imágenes del carrusel desde la base de datos
        $images = CarouselImage::all();
        // Obtener el ID del usuario autenticado, si está autenticado
        $userID = Auth::check() ? Auth::user()->id : null;
        return view('layouts.inicio-pagina.pagina-principal', compact('images','userID'));
    }

    public function uploadImage(Request $request)
    {
        // Validar la imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Asignar un nombre único a la imagen
        $imageName = time().'.'.$request->image->extension();

        // Guardar la imagen en la ruta especificada
        $request->image->storeAs('public/files/prin_img/imgs', $imageName);

        // Guardar solo el nombre de la imagen en la base de datos
        $carouselImage = new CarouselImage();
        $carouselImage->image = $imageName; // Solo guardar el nombre del archivo
        $carouselImage->save();

        return redirect()->back()->with('success', 'Imagen subida exitosamente.');
    }

    public function getImages($imageName)
    {
        // Obtiene la ruta completa del archivo de imagen en el almacenamiento
        $path = storage_path('/app/public/files/prin_img/imgs/'. $imageName);
        
        // Verifica si el archivo existe en la ruta especificada
        if (!file_exists($path)) {
            // Si el archivo no existe, aborta la solicitud con un error 404 (No Encontrado)
            abort(404);
        }
    
        // Devuelve el archivo de imagen como una respuesta al navegador
        return response()->file($path);
    }


    public function deleteImage($id)
    {
        // Encuentra el registro de la imagen por ID
        $image = CarouselImage::find($id);
    
        if (!$image) {
            return redirect()->back()->with('error', 'Imagen no encontrada.');
        }
    
        // Obtiene el nombre del archivo de la imagen (sin la ruta completa)
        $imageName = basename($image->image);
    
        // Elimina el archivo de la imagen del almacenamiento
        if (Storage::exists('public/files/prin_img/imgs/' . $imageName)) {
            Storage::delete('public/files/prin_img/imgs/' . $imageName);
        }
    
        // Elimina el registro de la imagen de la base de datos
        $image->delete();
    
        return redirect()->back()->with('success', 'Imagen eliminada exitosamente.');
    }


}