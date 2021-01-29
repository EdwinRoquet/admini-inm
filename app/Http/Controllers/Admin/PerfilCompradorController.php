<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seguimiento;
use App\Models\Comprarcasa;
use Illuminate\Http\Request;

class PerfilCompradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compradorescasas = Comprarcasa::all();
        $seguimientos = Seguimiento::all();


        return view('seguimientos.index',compact('compradorescasas','seguimientos') );
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
            'cliente'       => 'required',
            'admin'         => 'required',
            'capacidad_compra' => 'required',
            'descuento'      => 'required',
            'reembolso'        => 'required',
            'nota'        => 'required',
        ]);

          Seguimiento::create([
            'id_cliente'       => $data['cliente'],
            'id_admin'         => $data['admin'],
            'capacidad_compra' => $data['capacidad_compra'],
            'des_mensual'      => $data['descuento'],
            'reembolso'        => $data['reembolso'],
            'nota'        => $data['nota'],
          ]);

          return redirect()->action([SeguimientoController::class, 'index'])->with('mensaje','Se agrego  correctamente');
    }
    public function edit(Seguimiento $seguimiento)
    {
        $compradorescasas = Comprarcasa::all();
        return view('seguimientos.edit' , compact('seguimiento','compradorescasas'));
    }



    public function update(Request $request, Seguimiento $seguimiento)
    {


        $data = $request->validate([
            'clienteEditar'          => 'required',
            'adminEditar'            => 'required',
            'capacidad_compraEditar' => 'required',
            'descuentoEditar'        => 'required',
            'reembolsoEditar'        => 'required',
            'notaEditar'             => 'required',
        ]);

         // inserta los datos
           Seguimiento::where('id',$request->input('id'))->
           update([
             'id_cliente'       => $data['clienteEditar'],
             'id_admin'         => $data['adminEditar'],
             'capacidad_compra' => $data['capacidad_compraEditar'],
             'des_mensual'      => $data['descuentoEditar'],
             'reembolso'        => $data['reembolsoEditar'],
             'nota'             => $data['notaEditar'],

           ]);

          return redirect()->action([SeguimientoController::class, 'index'])->with('mensaje','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seguimiento $seguimiento)
    {
        $seguimiento->delete();
        return redirect()->action([SeguimientoController::class, 'index'])->with('mensaje','Se elimino correctamente');
    }


    public function nota(Request $request, Seguimiento $seguimiento)
    {
       return  response()->json($seguimiento);
    }
}
