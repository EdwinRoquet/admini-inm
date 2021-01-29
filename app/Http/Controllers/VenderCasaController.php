<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Operacion;
use App\Models\Propiedad;
use App\Models\VenderCasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VenderCasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $usuario = Auth::user();
        $vendercasas = VenderCasa::where('id_prospectador', $usuario->id)->get();
        return view('vendercasa.index', compact('vendercasas'));
    }

    public function indexadmin(Request $request)
    {

        $vendercasas = VenderCasa::all();
        return view('vendercasa.index', compact('vendercasas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operaciones  = Operacion::all();
        return view('vendercasa.create', compact('operaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $data = $request->validate([
            'id_prospectador'  => 'required',
            'nombre'           => 'required',
            'fecha'   => 'required',
            'direccion'        => 'required',
            'nacionalidad'     => 'required',
            'colonia'          => 'required',
            'municipio'        => 'required',
            'estado'           => 'required',
            'imss'             => 'required',
            'curp'             => 'required',
            'rfc'              => 'required',
            'operacion'     => 'required',
            'tel'              => 'required',
            'cel'              => 'required',
            'lat'              => 'required',
            'lng'              => 'required',
            'email'            => 'required',
            'predial'          => 'required',
            'titulo'          => 'required',
            'agua'             => 'required',
            'luz'              => 'required',
            'recamaras'       => 'required',
            'baños'           => 'required',
            'estacionamiento' => 'required',
            'estructura'      => 'required',
            'nota'            => 'required',
            'uuid'            => 'required',
            'metros_terreno'      => 'required',
            'metros_construccion' => 'required',
        ]);


    $cliente =   VenderCasa::create([
            'id_prospectador' => $data['id_prospectador'],
            'nombre'          => $data['nombre'],
            'fec_nacimiento'  => $data['fecha'],
            'direccion'       => $data['direccion'],
            'lat'       => $data['lat'],
            'lng'       => $data['lng'],
            'nacionalidad'    => $data['nacionalidad'],
            'colonia'         => $data['colonia'],
            'municipio'       => $data['municipio'],
            'estado'          => $data['estado'],
            'imss'            => $data['imss'],
            'curp'            => $data['curp'],
            'rfc'             => $data['rfc'],
            'id_operacion'    => $data['operacion'],
            'tel'             => $data['tel'],
            'cel'             => $data['cel'],
            'email'           => $data['email'],
            'uuid'           => $data['uuid'],
            'predial'         => $data['predial'],
            'c_agua'          => $data['agua'],
            'c_luz'           => $data['luz'],
        ]);


        Propiedad::create([
            'id_usuario'      => $cliente->id,
            'titulo'       => $data['titulo'],
            'recamaras'       => $data['recamaras'],
            'baños'           => $data['baños'],
            'uuid'            => $data['uuid'],
            'estacionamiento' => $data['estacionamiento'],
            'estructura_cons' => $data['estructura'],
            'm_terreno'       => $data['metros_terreno'],
            'm_construccion'  => $data['metros_construccion'],
            'nota'            => $data['nota'],
        ]);




        return redirect()->action([VenderCasaController::class, 'index'])->with('mensaje','Se guardo correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VenderCasa  $venderCasa
     * @return \Illuminate\Http\Response
     */
    public function show(VenderCasa $venderCasa)
    {

        foreach ($venderCasa->propiedades as $key => $propiedad) {
            $propiedad->uuid;
        }

        $imagenes = Imagen::where('id_propiedad', $propiedad->uuid)->get();


        return view('vendercasa.show', compact('venderCasa','imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VenderCasa  $venderCasa
     * @return \Illuminate\Http\Response
     */
    public function edit(VenderCasa $venderCasa)
    {
        $operaciones  = Operacion::all();

        // foreach ($venderCasa->propiedades as $key => $propiedad) {
        //     $propiedad->uuid;
        // }

        $imagenes = Imagen::where('id_propiedad', $venderCasa->uuid)->get();

       return view('vendercasa.edit', compact('venderCasa','imagenes','operaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VenderCasa  $venderCasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VenderCasa $venderCasa)
    {

        $data = $request->validate([
            'id_prospectador'  => 'required',
            'id_propiedad'  => 'required',
            'id_usuario'  => 'required',
            'nombre'           => 'required',
            'fecha'   => 'required',
            'direccion'        => 'required',
            'nacionalidad'     => 'required',
            'colonia'          => 'required',
            'municipio'        => 'required',
            'estado'           => 'required',
            'imss'             => 'required',
            'curp'             => 'required',
            'rfc'              => 'required',
            'operacion'     => 'required',
            'tel'              => 'required',
            'cel'              => 'required',
            'lat'              => 'required',
            'lng'              => 'required',
            'email'            => 'required',
            'predial'          => 'required',
            'titulo'          => 'required',
            'agua'             => 'required',
            'luz'              => 'required',
            'recamaras'       => 'required',
            'baños'           => 'required',
            'estacionamiento' => 'required',
            'estructura'      => 'required',
            'nota'            => 'required',
            'uuid'            => 'required',
            'metros_terreno'      => 'required',
            'metros_construccion' => 'required',
        ]);

        $venderCasa->id_prospectador = $data['id_prospectador'];
        $venderCasa->nombre = $data['nombre'];
        $venderCasa->fec_nacimiento = $data['fecha'];
        $venderCasa->direccion = $data['direccion'];
        $venderCasa->lat = $data['lat'];
        $venderCasa->lng = $data['lng'];
        $venderCasa->nacionalidad = $data['nacionalidad'];
        $venderCasa->colonia = $data['colonia'];
        $venderCasa->municipio = $data['municipio'];
        $venderCasa->estado = $data['estado'];
        $venderCasa->imss = $data['imss'];
        $venderCasa->curp = $data['curp'];
        $venderCasa->rfc = $data['rfc'];
        $venderCasa->id_operacion = $data['operacion'];
        $venderCasa->tel = $data['tel'];
        $venderCasa->cel = $data['cel'];
        $venderCasa->email = $data['email'];
        $venderCasa->uuid = $data['uuid'];
        $venderCasa->predial = $data['predial'];
        $venderCasa->c_agua = $data['agua'];
        $venderCasa->c_luz = $data['luz'];
        $venderCasa->save();



       $propiedad = Propiedad::findOrFail($data['id_propiedad']);

       $propiedad->id_usuario = $data['id_usuario'];
       $propiedad->titulo = $data['titulo'];
       $propiedad->recamaras = $data['recamaras'];
       $propiedad->baños = $data['baños'];
       $propiedad->uuid = $data['uuid'];
       $propiedad->estacionamiento = $data['estacionamiento'];
       $propiedad->estructura_cons = $data['estructura'];
       $propiedad->m_terreno = $data['metros_terreno'];
       $propiedad->m_construccion = $data['metros_construccion'];
       $propiedad->nota = $data['nota'];

       $propiedad->save();

       return redirect()->action([VenderCasaController::class, 'index'])->with('mensaje','Se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VenderCasa  $venderCasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(VenderCasa $venderCasa)
    {


       // Imagenes a eliminar

       $imagenes = Imagen::where('id_propiedad', $venderCasa->uuid)->get();


       foreach ($imagenes as $imagen) {

           if(File::exists('storage/' . $imagen->ruta_imagen)) {
               // Elimina imagen del servidor
               File::delete('storage/' . $imagen->ruta_imagen);

               // elimina imagen de la BD
               Imagen::where('ruta_imagen', $imagen->ruta_imagen )->delete();

           }

       }


    $venderCasa->delete();
    return redirect()->action([VenderCasaController::class, 'index'])->with('mensaje','Se elimino correctamente');
    }
}
