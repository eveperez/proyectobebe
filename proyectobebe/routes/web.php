<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoscontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\moduloropacontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ruta1', function () {
    return ("hola mundo");
});

Route::get('altaproductos',[productoscontroller::class,'altaproductos'])->name('altaproductos');
Route::post('guardarproducto', [productoscontroller::class,'guardarproducto'])->name('guardarproducto');
Route::get('reporteproducto', [productoscontroller::class,'reporteproducto'])->name('reporteproducto');
Route::get('desactivaproducto/{idpro}',[productoscontroller::class,'desactivaproducto'])->name('desactivaproducto');
Route::get('activaproducto/{idpro}',[productoscontroller::class,'activaproducto'])->name('activaproducto');
Route::get('modificaproducto/{idpro}',[productoscontroller::class,'modificaproducto'])->name('modificaproducto');
Route::post('editarproducto', [productoscontroller::class,'editarproducto'])->name('editarproducto');
Route::get('eliminaproducto/{idpro}', [productoscontroller::class,'eliminaproducto'])->name('eliminaproducto');
Route::get('principal',[productoscontroller::class,'principal'])->name('principal');

//---------------------------------------------------------------------------------------------
Route::get('login',[logincontroller::class,'login'])->name('login');
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');
Route::get('principal',[logincontroller::class,'principal'])->name('principal');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');


//-------------------------MODULO-----------------------------------------------------------------

Route::get('altacompra',[moduloropacontroller::class,'altacompra'])->name('altacompra');
Route::get('infocliente',[moduloropacontroller::class,'infocliente'])->name('infocliente');
Route::get('combocategoria',[moduloropacontroller::class,'combocategoria'])->name('combocategoria');
Route::get('infoproducto', [moduloropacontroller::class, 'infoproducto'])->name('infoproducto');
Route::get('infocompra', [moduloropacontroller::class, 'infocompra'])->name('infocompra');
Route::get('infopago', [moduloropacontroller::class, 'infopago'])->name('infopago');

Route::get('botoninfo', [moduloropacontroller::class, 'botoninfo'])->name('botoninfo');
Route::get('borracompra',[VentaController::class,'borracompra'])->name('borracompra');


Route::post('guardarcompra', [moduloropacontroller::class,'guardarcompra'])->name('guardarcompra');
Route::get('reportecompras',[moduloropacontroller::class,'reportecompras'])->name('reportecompras');




