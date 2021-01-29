<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
     public function store( Request $request)
    {

        // return $request->all();
        $ruta_imagen = $request->file('file')->store('propiedades','public');

        $imagen = Image::make( public_path("storage/{$ruta_imagen}"))->fit(800, 450);
        $imagen->save();

        //Almacenar con modelo
        // $imagenDB = new Imagen;
        // $imagenDB->id_propiedad = $request['uuid'];
        // $imagenDB->ruta_imagen = $ruta_imagen;
        // $imagenDB->save();

        Imagen::create([
             'id_propiedad' => $request['uuid'],
             'ruta_imagen'  => $ruta_imagen,
        ]);

        $respuesta = [
            'archivo' => $ruta_imagen
        ];


        return response()->json($respuesta);
    }

    public function destroy( Request $request)
    {
        // $imagen = $request->get('imagen');

        // if(File::exists('storage/'. $imagen)){
        //     File::delete('storage/'. $imagen);
        // }

        // $respuesta = [
        //     'mensaje' => 'Imagen Eliminada',
        //     ' imagen' => $imagen
        // ];

        // $imagenEliminar = Imagen::where('ruta_imagen','=', $imagen)->firstOrFail();
        // Imagen::destroy($imagenEliminar->id);

        // return response()->json($respuesta);




            // Imagen a eliminar
            $imagen = $request->get('imagen');

           if(File::exists('storage/' . $imagen)) {
               // Elimina imagen del servidor
               File::delete('storage/' . $imagen);

               // elimina imagen de la BD
               Imagen::where('ruta_imagen', $imagen )->delete();

               $respuesta = [
                    'mensaje' => 'Imagen Eliminada',
                    'imagen' => $imagen
                ];
           }




            return response()->json($respuesta);
    }
}
