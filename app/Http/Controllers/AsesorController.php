<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use App\Models\PerfilVendedor;
use Illuminate\Support\Facades\Auth;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $usuario = Auth::user();
        $perfilventas = PerfilVendedor::all();
        $asesores = Asesor::where('id_usuario', $usuario->id)->get();
        return view('asesores.index', compact('perfilventas','asesores'));
    }

    public function indexadmin()
    {
        $perfilventas = PerfilVendedor::all();
        $asesores = Asesor::all();
        return view('asesores.index', compact('perfilventas','asesores'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'usuario' => 'required',
            'perfil'     => 'required',
            'pago_mensual'   => 'required',
            'monto_de_recuperacion'   => 'required',
            'predial'    => 'required',
            'deuda_agua' => 'required',
            'deuda_luz'  => 'required',
            'nota'       => 'required',
            'otros'      => 'required',
        ]);

        Asesor::create([
            'id_usuario' => $data['usuario'],
            'id_perfil'  => $data['perfil'],
            'pago_mes'   => $data['pago_mensual'],
            'monto'   => $data['monto_de_recuperacion'],
            'de_predial' => $data['predial'],
            'de_agua'    => $data['deuda_agua'],
            'de_luz'     => $data['deuda_luz'],
            'nota'       => $data['nota'],
            'otros'      => $data['otros'],
        ]);

        return redirect()->action([AsesorController::class, 'index'])->with('mensaje','Se agrego correctamente');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Asesor $asesor)
    {
        $perfilventas = PerfilVendedor::all();

      return view('asesores.edit', compact('perfilventas','asesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asesor $asesor)
    {
        $data = $request->validate([
            'usuario' => 'required',
            'perfil'     => 'required',
            'pago_mensual'   => 'required',
            'monto_de_recuperacion'   => 'required',
            'predial'    => 'required',
            'deuda_agua' => 'required',
            'deuda_luz'  => 'required',
            'nota'       => 'required',
            'otros'      => 'required',
        ]);

        $asesor->id_usuario = $data['usuario'];
        $asesor->id_perfil = $data['perfil'];
        $asesor->pago_mes = $data['pago_mensual'];
        $asesor->monto = $data['monto_de_recuperacion'];
        $asesor->de_predial = $data['predial'];
        $asesor->de_agua = $data['deuda_agua'];
        $asesor->de_luz = $data['deuda_luz'];
        $asesor->nota = $data['nota'];
        $asesor->otros = $data['otros'];

        $asesor->save();

        return redirect()->action([AsesorController::class, 'index'])->with('mensaje','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asesor $asesor)
    {
        $asesor->delete();
        return redirect()->action([AsesorController::class, 'index'])->with('mensaje','Se elimno correctamente');
    }
}
