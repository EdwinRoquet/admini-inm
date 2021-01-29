<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AvaluoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\VenderCasaController;
use App\Http\Controllers\ComprarCasaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\PerfilVendedorController;
use App\Http\Controllers\Admin\PerfilCompradorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('inicio');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');


   //Rutas para usuarios del sistema
   Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
   Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
   Route::delete('/usuario/{user}',[UsuarioController::class, 'destroy'])->name('usuario.destroy');

   //Rutas para prospectos
   Route::get('/comprar-casa', [ComprarCasaController::class, 'index'])->name('comprarcasa.index');
   Route::post('/comprar-casa', [ComprarCasaController::class, 'store'])->name('comprarcasa.store');
   Route::get('/comprar-casa/{comprarCasa}', [ComprarCasaController::class, 'show'])->name('comprarcasa.show');
   Route::get('/comprar-casa/{comprarCasa}/edit',  [ComprarCasaController::class, 'edit'])->name('comprarcasa.edit');
   Route::put('/comprar-casa/{comprarCasa}', [ComprarCasaController::class, 'update'])->name('comprarcasa.update');
   Route::delete('/comprar-casa/{comprarCasa}',[ComprarCasaController::class, 'destroy'])->name('comprarcasa.destroy');

   //Rutas para el seguimiento de la compra
   Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento.index');
   Route::get('/seguimiento/{seguimiento}/edit',  [SeguimientoController::class, 'edit'])->name('seguimiento.edit');
   Route::post('/seguimiento', [SeguimientoController::class, 'store'])->name('seguimiento.store');
   Route::post('/seguimiento/{seguimiento}', [SeguimientoController::class, 'nota'])->name('seguimiento.nota');
   Route::put('/nota', [SeguimientoController::class, 'update'])->name('nota.update');
   Route::delete('/seguimiento/{seguimiento}',[SeguimientoController::class, 'destroy'])->name('seguimiento.destroy');

   //Ruta para concretar la venta
   Route::get('/perfil-venta', [PerfilVendedorController::class, 'index'])->name('perfilventa.index');
   Route::post('/perfil-venta', [PerfilVendedorController::class, 'store'])->name('perfilventa.store');
   Route::get('/perfil-venta/{perfilVendedor}/edit',  [PerfilVendedorController::class, 'edit'])->name('perfilventa.edit');
   Route::put('/perfil-venta/{perfilVendedor}', [PerfilVendedorController::class, 'update'])->name('perfilventa.update');
   Route::delete('/perfil-venta/{perfilVendedor}',[PerfilVendedorController::class, 'destroy'])->name('perfilventa.destroy');



   //Rutas para los asesores
   Route::get('/asesor', [AsesorController::class, 'index'])->name('asesor.index');
   Route::post('/asesor', [AsesorController::class, 'store'])->name('asesor.store');
   Route::get('/asesor/{asesor}/edit',  [AsesorController::class, 'edit'])->name('asesor.edit');
   Route::put('/asesor/{asesor}', [AsesorController::class, 'update'])->name('asesor.update');
   Route::delete('/asesor/{asesor}',[AsesorController::class, 'destroy'])->name('asesor.destroy');

   //Rutas para la venta
   Route::get('/vendedores', [VentaController::class, 'index'])->name('venta.index');
   Route::post('/vendedores', [VentaController::class, 'store'])->name('venta.store');
   Route::get('/vendedores/{venta}/edit',  [VentaController::class, 'edit'])->name('venta.edit');
   Route::put('/vendedores/{venta}', [VentaController::class, 'update'])->name('venta.update');
   Route::delete('/vendedores/{venta}',[VentaController::class, 'destroy'])->name('venta.destroy');


   //Ruta para vender casas

   Route::get('/vender-casa', [VenderCasaController::class, 'index'])->name('vendercasa.index');
   Route::get('/vender-casa/create', [VenderCasaController::class, 'create'])->name('vendercasa.create');
   Route::post('/vender-casa', [VenderCasaController::class, 'store'])->name('vendercasa.store');
   Route::get('/vender-casa/{venderCasa}', [VenderCasaController::class, 'show'])->name('vendercasa.show');
   Route::get('/vender-casa/{venderCasa}/edit',  [VenderCasaController::class, 'edit'])->name('vendercasa.edit');
   Route::put('/vender-casa/{venderCasa}', [VenderCasaController::class, 'update'])->name('vendercasa.update');
   Route::delete('/vender-casa/{venderCasa}',[VenderCasaController::class, 'destroy'])->name('vendercasa.destroy');

   //Ruta de propiedades
   Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedad.index');
   Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedad.store');
   Route::post('/propiedades/{propiedades}', [PropiedadController::class, 'show'])->name('propiedad.show');


   Route::post('/imagenes/store', [ImagenController::class , 'store'])->name('imagenes.store');
   Route::post('/imagenes/destroy', [ImagenController::class , 'destroy'])->name('imagenes.destroy');


   Route::get('/avaluos', [AvaluoController::class, 'index'])->name('avaluo.index');
   Route::post('/avaluos', [AvaluoController::class, 'store'])->name('avaluo.store');
   Route::get('/avaluos/{avaluo}/edit',  [AvaluoController::class, 'edit'])->name('avaluo.edit');
   Route::put('/avaluos/{avaluo}', [AvaluoController::class, 'update'])->name('avaluo.update');
   Route::delete('/avaluos/{avaluo}',[AvaluoController::class, 'destroy'])->name('avaluo.destroy');


    //Rutas ppara  ADMIN

 Route::get('/admin/seguimiento', [SeguimientoController::class, 'indexadmin'])->name('admmin.seguimiento.index');
 Route::get('/admin/vender-casa', [VenderCasaController::class, 'indexadmin'])->name('admin.vendercasa.index');
 Route::get('/admin/comprar-casa', [ComprarCasaController::class, 'indexadmin'])->name('admin.comprarcasa.index');
 Route::get('/admin/perfil-venta', [PerfilVendedorController::class, 'indexadmin'])->name('admin.perfilventa.index');
 Route::get('/admin/avaluos', [AvaluoController::class, 'indexadmin'])->name('admin.avaluo.index');
 Route::get('/admin/vendedores', [VentaController::class, 'indexadmin'])->name('admin.venta.index');
 Route::get('/admin/asesor', [AsesorController::class, 'indexadmin'])->name('admin.asesor.index');

});

