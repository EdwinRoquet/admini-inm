<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Imagen;
use App\Models\Propiedad;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VentaController extends Controller
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
        $perfiles  = Seguimiento::all();
        $ventas = Venta::where('id_usuario', $usuario->id)->get();
        return view('ventas.index', compact('propiedades', 'perfiles','ventas'));
    }

    public function indexadmin()
    {
        $propiedades = Propiedad::all();
        $perfiles  = Seguimiento::all();
        $ventas = Venta::all();
        return view('ventas.index', compact('propiedades', 'perfiles','ventas'));
    }


    public function store(Request $request)
    {

        // dd($request);

        $data = $request->validate([

            'credito'   => 'required',
            'propiedad'      => 'required',
            'usuario'        => 'required',
            'perfil'         => 'required',
            'nombre_empresa' => 'required',
            'tel_empresa'    => 'required',
            'reg_patronal'   => 'required',
            'extension'      => 'required',
            'clave'          => 'required',
            'uuid'           => 'required',
            'taller'         => 'required',
            'nota'           => 'required',
            'referenciauno'      => 'required',
            'referenciados'      => 'required',
            'referenciatres'     => 'required',

            ]);



    Venta::create([
        't_credito'      => $data['credito'],
        'id_propiedad'   => $data['propiedad'],
        'id_usuario'     => $data['usuario'],
        'id_perfil'      => $data['perfil'],
        'nombre_empresa' => $data['nombre_empresa'],
        'tel_empresa'    => $data['tel_empresa'],
        'reg_patronal'   => $data['reg_patronal'],
        'extension'      => $data['extension'],
        'clave_inter'    => $data['clave'],
        'uuid'           => $data['uuid'],
        'taller'         => $data['taller'],
        'nota'           => $data['nota'],
        'refer_uno'      => $data['referenciauno'],
        'refer_dos'      => $data['referenciados'],
        'refer_tres'     => $data['referenciatres'],
    ]);

    return redirect()->action([VentaController::class, 'index'])->with('mensaje', 'Se agrego correctamente');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $propiedades = Propiedad::all();
        $perfiles  = Seguimiento::all();

        $imagenes = Imagen::where('id_propiedad', $venta->uuid)->get();

        return view('ventas.edit' , compact('venta', 'propiedades','imagenes','perfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {


        $data = $request->validate([

            'credito'   => 'required',
            'propiedad'      => 'required',
            'usuario'        => 'required',
            'perfil'         => 'required',
            'nombre_empresa' => 'required',
            'tel_empresa'    => 'required',
            'reg_patronal'   => 'required',
            'extension'      => 'required',
            'clave'          => 'required',
            'uuid'           => 'required',
            'taller'         => 'required',
            'nota'           => 'required',
            'referenciauno'      => 'required',
            'referenciados'      => 'required',
            'referenciatres'     => 'required',

        ]);

        $venta->t_credito = $data['credito'];
        $venta->id_propiedad = $data['propiedad'];
        $venta->id_usuario = $data['usuario'];
        $venta->id_perfil = $data['perfil'];
        $venta->nombre_empresa = $data['nombre_empresa'];
        $venta->tel_empresa = $data['tel_empresa'];
        $venta->reg_patronal = $data['reg_patronal'];
        $venta->extension = $data['extension'];
        $venta->clave_inter = $data['clave'];
        $venta->uuid = $data['uuid'];
        $venta->taller = $data['taller'];
        $venta->nota = $data['nota'];
        $venta->refer_uno = $data['referenciauno'];
        $venta->refer_dos = $data['referenciados'];
        $venta->refer_tres = $data['referenciatres'];

        $venta->save();

        return redirect()->action([VentaController::class, 'index'])->with('mensaje', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {

            // Imagenes a eliminar

            $imagenes = Imagen::where('id_propiedad', $venta->uuid)->get();


            foreach ($imagenes as $imagen) {

                if(File::exists('storage/' . $imagen->ruta_imagen)) {
                    // Elimina imagen del servidor
                    File::delete('storage/' . $imagen->ruta_imagen);

                    // elimina imagen de la BD
                    Imagen::where('ruta_imagen', $imagen->ruta_imagen )->delete();

                }

            }



        $venta->delete();
        return redirect()->action([VentaController::class, 'index'])->with('mensaje', 'Se elimino correctamente');
    }

}
