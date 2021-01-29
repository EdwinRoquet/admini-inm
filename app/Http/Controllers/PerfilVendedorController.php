<?php

namespace App\Http\Controllers;

use App\Models\VenderCasa;
use Illuminate\Http\Request;
use App\Models\PerfilVendedor;
use Illuminate\Support\Facades\Auth;

class PerfilVendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        $vendedorcasas = VenderCasa::where('status', 0)->get();
        $perfilVendedores = PerfilVendedor::where('id_usuario', $usuario->id)->get();

        return view('perfilvendedor.index', compact('vendedorcasas','perfilVendedores'));
    }


    public function indexadmin()
    {

        $vendedorcasas = VenderCasa::all();
        $perfilVendedores = PerfilVendedor::all();

        return view('perfilvendedor.index', compact('vendedorcasas','perfilVendedores'));
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
            'cliente'  => 'required',
            'admin'    => 'required',
            'deuda'    => 'required',
            'nota'     => 'required',
        ]);

          PerfilVendedor::create([
            'id_vendedor' => $data['cliente'],
            'id_admin'    => $data['admin'],
            'deuda'       => $data['deuda'],
            'nota'        => $data['nota'],
          ]);

          $venderCasa = VenderCasa::findOrFail($data['cliente']);
          $venderCasa->status  = 1;
          $venderCasa->save();

          return redirect()->action([PerfilVendedorController::class, 'index'])->with('mensaje','Se guardo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerfilVendedor  $perfilVendedor
     * @return \Illuminate\Http\Response
     */
    public function show(PerfilVendedor $perfilVendedor)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerfilVendedor  $perfilVendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(PerfilVendedor $perfilVendedor)
    {
        $vendedorcasas = VenderCasa::all();
        return view('perfilvendedor.edit', compact('perfilVendedor','vendedorcasas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerfilVendedor  $perfilVendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerfilVendedor $perfilVendedor)
    {
        $data = $request->validate([
            'cliente'  => 'required',
            'admin'    => 'required',
            'deuda'    => 'required',
            'nota'     => 'required',
        ]);

        $perfilVendedor->deuda = $data['deuda'];
        $perfilVendedor->nota = $data['nota'];
        $perfilVendedor->id_vendedor = $data['cliente'];
        $perfilVendedor->id_admin = $data['admin'];

        $perfilVendedor->save();

        return redirect()->action([PerfilVendedorController::class, 'index'])->with('mensaje','Se actualizo correctamente');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerfilVendedor  $perfilVendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerfilVendedor $perfilVendedor)
    {
        $perfilVendedor->delete();
        return redirect()->action([PerfilVendedorController::class, 'index'])->with('mensaje','Se elimino correctamente');
    }
}
