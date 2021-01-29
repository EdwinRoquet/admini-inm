<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Avaluo;
use App\Models\ComprarCasa;
use App\Models\PerfilVendedor;
use App\Models\Propiedad;
use App\Models\Seguimiento;
use App\Models\VenderCasa;
use App\Models\Venta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.2010
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $prospectoComprador =  ComprarCasa::all()->count();
      $propesctoVendedor = VenderCasa::all()->count();
      $propiedades = Propiedad::all()->count();
      $perfilVenta = PerfilVendedor::all()->count();
      $perfilCompra = Seguimiento::all()->count();
      $ventas = Venta::all()->count();
      $asesor = Asesor::all()->count();
      $avaluos = Avaluo::all()->count();

        return view('home', compact('prospectoComprador','propesctoVendedor','propiedades','perfilVenta','perfilCompra','ventas','asesor','avaluos'));
    }
}
