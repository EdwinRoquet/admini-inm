<?php

namespace App\Http\Controllers;

use App\Models\Metedo;
use App\Models\Operacion;
use App\Models\ComprarCasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprarCasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        $metodos = Metedo::all();
        $operaciones = Operacion::all();
        $comprarcasas = ComprarCasa::where('id_prospectador', $usuario->id)->get();

        return view('comprarcasa.index', compact('metodos','operaciones','comprarcasas'));
    }
    public function indexadmin()
    {

        $metodos = Metedo::all();
        $operaciones = Operacion::all();
        $comprarcasas = ComprarCasa::all();

        return view('comprarcasa.index', compact('metodos','operaciones','comprarcasas'));
    }


    public function store(Request $request)
    {

        // dd($request);
        $data = $request->validate([
            'id_prospectador' => 'required',
            'nombre'          => 'required',
            'fecha'           => 'required',
            'direccion'       => 'required',
            'nacionalidad'    => 'required',
            'colonia'         => 'required',
            'municipio'       => 'required',
            'estado'          => 'required',
            'imss'            => 'required',
            'curp'            => 'required',
            'rfc'             => 'required',
            'operacion'       => 'required',
            'tel'             => 'required',
            'cel'             => 'required',
            'email'           => 'required',
            'metodo'          => 'required',
        ]);

          ComprarCasa::create([
               'id_prospectador' => $data['id_prospectador'],
               'nombre'          => $data['nombre'],
               'fec_nacimiento'  => $data['fecha'],
               'direccion'       => $data['direccion'],
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
               'id_metodo'       => $data['metodo'],
          ]);

          return redirect()->action([ComprarCasaController::class, 'index'])->with('mensaje','Se agrego  correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComprarCasa  $comprarCasa
     * @return \Illuminate\Http\Response
     */
    public function show(ComprarCasa $comprarCasa)
    {
        return view('comprarcasa.show', compact('comprarCasa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComprarCasa  $comprarCasa
     * @return \Illuminate\Http\Response
     */
    public function edit(ComprarCasa $comprarCasa)
    {
        $metodos = Metedo::all();
        $operaciones = Operacion::all();
       return view('comprarcasa.edit', compact('comprarCasa', 'metodos','operaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComprarCasa  $comprarCasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComprarCasa $comprarCasa)
    {
        $data = $request->validate([
            'id_prospectador' => 'required',
            'nombre'          => 'required',
            'fecha'           => 'required',
            'direccion'       => 'required',
            'nacionalidad'    => 'required',
            'colonia'         => 'required',
            'municipio'       => 'required',
            'estado'          => 'required',
            'imss'            => 'required',
            'curp'            => 'required',
            'rfc'             => 'required',
            'operacion'       => 'required',
            'tel'             => 'required',
            'cel'             => 'required',
            'email'           => 'required',
            'metodo'          => 'required',
        ]);

        $comprarCasa->id_prospectador = $data['id_prospectador'];
        $comprarCasa->nombre = $data['nombre'];
        $comprarCasa->fec_nacimiento = $data['fecha'];
        $comprarCasa->direccion = $data['direccion'];
        $comprarCasa->nacionalidad = $data['nacionalidad'];
        $comprarCasa->colonia = $data['colonia'];
        $comprarCasa->municipio = $data['municipio'];
        $comprarCasa->estado = $data['estado'];
        $comprarCasa->imss = $data['imss'];
        $comprarCasa->curp = $data['curp'];
        $comprarCasa->rfc = $data['rfc'];
        $comprarCasa->id_operacion = $data['operacion'];
        $comprarCasa->tel = $data['tel'];
        $comprarCasa->cel = $data['cel'];
        $comprarCasa->email = $data['email'];
        $comprarCasa->id_metodo = $data['metodo'];

        $comprarCasa->save();

       return redirect()->action([ComprarCasaController::class, 'index'])->with('mensaje','Se actualizo  correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComprarCasa  $comprarCasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComprarCasa $comprarCasa)
    {
         $comprarCasa->delete();
         return redirect()->action([ComprarCasaController::class, 'index'])->with('mensaje','Se elimino correctamente');
    }
}
