<?php

namespace App\Http\Controllers;

use App\Models\Avaluo;
use App\Models\Imagen;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AvaluoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuario = Auth::user();
        $propiedades = Propiedad::all();
        $avaluos = Avaluo::where('id_usuario', $usuario->id)->get();

        $avaluoConImagenes = [];


        foreach ( $avaluos as $key => $avaluo) {
            $imagenes = Imagen::where('id_propiedad', $avaluo->uuid)->get();
            $avaluo->imagenes = $imagenes;

          array_push($avaluoConImagenes, $avaluo);
        }



        // foreach ($avaluos as $key => $avaluo) {
        //     $avaluo->uuid;
        //     $imagenes = Imagen::where('id_propiedad', $avaluo->uuid)->get();
        // }


        return view('avaluos.index', compact('propiedades', 'avaluos','avaluoConImagenes'));
    }

    public function indexadmin()
    {
        $propiedades = Propiedad::all();
        $avaluos = Avaluo::all();

        $avaluoConImagenes = [];


        foreach ( $avaluos as $key => $avaluo) {
            $imagenes = Imagen::where('id_propiedad', $avaluo->uuid)->get();
            $avaluo->imagenes = $imagenes;

          array_push($avaluoConImagenes, $avaluo);
        }

        return view('avaluos.index', compact('propiedades', 'avaluos','avaluoConImagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'propiedad'  => 'required',
            'usuario'  => 'required',
            // 'ruta_plano'  => 'required|mimes:pdf|max:5000',
            'expediente'  => 'required',
            'status'  => 'required',
            'uuid'  => 'required',
            'valor'  => 'required',
            'nota'  => 'required',
        ]);


        // if ($request->file('ruta_plano')) {
        //     $archivo = $request->file('ruta_plano');
        //     $nombreArchivo = time() . "." . $request->file('ruta_plano')->extension();
        //     $ubicacion = public_path('/storage/plano');
        //     $archivo->move($ubicacion , $nombreArchivo);
        // }

        Avaluo::create([
            'id_propiedad' => $data['propiedad'],
            'id_usuario' => $data['usuario'],
            // 'ruta_plano' => $nombreArchivo,
            'expediente' => $data['expediente'],
            'status' => $data['status'],
            'uuid' => $data['uuid'],
            'valor' => $data['valor'],
            'nota' => $data['nota'],
        ]);

        return redirect()->action([AvaluoController::class, 'index'])->with('mensaje', 'Se agrego correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avaluo  $avaluo
     * @return \Illuminate\Http\Response
     */
    public function show(Avaluo $avaluo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avaluo  $avaluo
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaluo $avaluo)
    {

        $propiedades = Propiedad::all();
        $imagenes = Imagen::where('id_propiedad', $avaluo->uuid)->get();
        return view('avaluos.edit', compact('propiedades','avaluo','imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avaluo  $avaluo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaluo $avaluo)
    {
        $data = $request->validate([
            'propiedad'  => 'required',
            'usuario'  => 'required',
         // 'ruta_plano'  => 'required|mimes:pdf|max:5000',
            'expediente'  => 'required',
            'status'  => 'required',
            'uuid'  => 'required',
            'valor'  => 'required',
            'nota'  => 'required',
        ]);
        $avaluo->id_propiedad = $data['propiedad'];
        $avaluo->id_usuario = $data['usuario'];
        // $avaluo->ruta_plano = $data['ruta_plano'];
        $avaluo->expediente = $data['expediente'];
        $avaluo->status = $data['status'];
        $avaluo->uuid = $data['uuid'];
        $avaluo->valor = $data['valor'];
        $avaluo->nota = $data['nota'];

        $avaluo->save();

        return redirect()->action([AvaluoController::class, 'index'])->with('mensaje','Se elimino correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avaluo  $avaluo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaluo $avaluo)
    {
          // Imagenes a eliminar

       $imagenes = Imagen::where('id_propiedad', $avaluo->uuid)->get();


       foreach ($imagenes as $imagen) {

           if(File::exists('storage/' . $imagen->ruta_imagen)) {
               // Elimina imagen del servidor
               File::delete('storage/' . $imagen->ruta_imagen);

               // elimina imagen de la BD
               Imagen::where('ruta_imagen', $imagen->ruta_imagen )->delete();

           }

       }


    $avaluo->delete();
    return redirect()->action([AvaluoController::class, 'index'])->with('mensaje','Se elimino correctamente');
    }
}
