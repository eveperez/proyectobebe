<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\compras;
use App\Models\categorias;
use App\Models\detallecompras;
use App\Models\productos;
use App\Models\proveedores;
use Illuminate\Support\Facades\DB;
use Session;


class moduloropacontroller extends Controller
{
    public function altacompra()
    {

        //$consulta = compras::all();
        $compras = compras::orderby('idcompra','desc')
                        ->get();

        $clientes = clientes::orderby("nombrecli", 'asc')
                        ->get();

        $proveedores = proveedores::orderby('nombrepro','asc')
                        ->get();

        $categorias = categorias::orderby('nombre','asc')
                        ->get();

        // $productos = productos::orderby('nombre','asc')
        //                 ->get();
        

        $cuantos = count($compras);
        if($cuantos>=1)
        {
            $siguiente = $compras[0]->idcompra + 1;

        }
        else {
            $siguiente= 1;
        }

        return view("sistema.altacompra")
                ->with('siguiente', $siguiente)
                ->with('clientes', $clientes)
                //->with('productos', $productos)
                ->with('categorias', $categorias)
                ->with('proveedores', $proveedores);
        //return $consulta;  
    }


    public function infocliente(Request $request)
    {
        $consultaa = clientes::where('idcliente','=',$request->idcliente)
                                ->get();
         //return $consulta;
        return view('sistema.infocliente')->with('consultaa',$consultaa[0]);
    }

    public function combocategoria(Request $request){
        $consulta2 = productos::where('idcate','=',$request->idcate)
                                ->get();
         //return $consulta;
        return view('sistema.comboCategoria')->with('consulta2',$consulta2);
    }

    public function infoproducto(Request $request){
        $id = $request->idpro;
    
        // Consulta para obtener la cantidad disponible del producto
        $disponible = \DB::select("SELECT cantidad FROM productos WHERE idpro = $id");
        $cantidadDisponible = $disponible[0]->cantidad ?? 0;
    
        // Verificar si el producto está disponible o agotado
        $estadoProducto = ($cantidadDisponible !== null && $cantidadDisponible !== 0) ? 'Disponible' : 'Agotado';
    
        // Consulta para obtener las ventas relacionadas al producto
        $consultai = \DB::select("SELECT pro.idpro, pro.nombre, SUM(dc.cantidad * dc.precio) AS total
                                FROM productos AS pro
                                INNER JOIN detallecompras AS dc ON pro.idpro = dc.idpro
                                WHERE pro.idpro = $id
                                GROUP BY pro.idpro, pro.nombre;");
                                
                                
    
        return view('sistema.infoproducto')->with('consultai', $consultai)->with('estadoProducto', $estadoProducto);
    
    }
    
    public function infocompra(Request $request)
    {
        $consultac = productos::where('idpro','=',$request->idpro)
                            ->get();
      //return $consulta;
        return view('sistema.infocompra')->with('consultac',$consultac[0]);
    }

    public function infopago(Request $request){
        $tipo = $request->tipo;
        return view('sistema.infopago')
        ->with('tipo',$tipo);
    }

    public function botoninfo(Request $request){
        $tipo=$request->tipo;
        $consulta = compras::where('idcompra',$request->idcompra)->get();
        $cuantos = count($consulta);
            if($cuantos==0)
        {
            $ventas = new compras;
            $ventas->idcompra = $request->idcompra;
            $ventas->fecha = $request->fecha;
            $ventas->save();
        }

         // Obtener el producto y verificar si existe
        $producto = productos::find($request->idpro);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        }

         // Verificar si hay suficiente cantidad para la venta
        if ($producto->cantidad < $request->cant) {
            return response()->json(['error' => 'No hay suficiente cantidad de producto disponible.'], 400);
        }

         // Actualizar la cantidad del producto de manera segura
        $producto->decrement('cantidad', $request->cant);

        $ventasdetalle = new detallecompras;
        $ventasdetalle->idcompra = $request->idcompra;
        $ventasdetalle->idpro = $request->idpro;
        $ventasdetalle->cantidad = $request->cant;
        $ventasdetalle->precio = $request->costo;
        $ventasdetalle->save();

        $productosventa=\DB::select("
            SELECT pro.nombre, dv.cantidad, dv.precio, dv.cantidad * dv.precio AS subtotal, dv.iddetalle, dv.idcompra
            FROM detallecompras AS dv 
            INNER JOIN productos AS pro ON pro.idpro = dv.idpro
            WHERE dv.idcompra = $request->idcompra");

        $totalventa = \DB::select("
            SELECT SUM(md.cantidad * md.precio) AS total
            FROM detallecompras AS md 
            WHERE md.idcompra = $request->idcompra");

        return view('sistema.botoninfo')
        ->with('productosventa',$productosventa)
        ->with('totalventa',$totalventa[0]);
    }

    public function borracompra(Request $request){
            $eliminaregistro = \DB::delete("DELETE 
                FROM detallecompras
                WHERE iddetalle = $request->iddetalle");
    
            $productosventaa=\DB::select("
                SELECT pro.nombre, vd.cantidad, vd.precio, vd.cantidad * vd.precio AS subtotal, vd.iddetalle, vd.idcompra
                FROM detallecompras AS vd
                INNER JOIN productos AS pro ON pro.idpro = vd.idpro
                WHERE vd.idcompra = $request->idcompra");
    
        $totalventaa = \DB::select("
            SELECT SUM(md.cantidad * md.precio) AS total
            FROM detallecompras AS md 
            WHERE md.idcompra = $request->idcompra");
    
        return view('sistema.botoninfo')
        ->with('productosventaa',$productosventaa)
        ->with('totalventaa',$totalventaa[0]);
    }


    public function guardarcompra(Request $request){
        if($request->tipo == 1){

            $this->validate($request,[
                'nombre'=>'required',
                'tipo'=>'required',
                'cd'=>'required|numeric',
        ]);

        $result = \DB::select("
            SELECT SUM(dc.cantidad * dc.precio) AS total
            FROM detallecompras AS dc
            WHERE dc.idcompra = $request->idcompra");

        // Obtén el total del resultado (puede haber más de una columna, así que accedemos al primer elemento del array)
        $totalventa = $result[0]->total;

        $ventas = compras::find($request->idcompra);

        // Convierte el valor en un decimal
        $totalventaDecimal = (float) $totalventa;
        $ventas->fecha = $request->fecha;
        $ventas->idcliente = $request->idcliente;
        $ventas->idprove = $request->idprove;

        // Asigna el valor al campo total
        $ventas->total = $totalventaDecimal;
        $ventas->save();

        Session::flash('mensaje',"Venta registrada");
            return redirect()->route('reportecompras'); //CAMBIAR AL REPORTE DE COMPRA
        }
        else{
        $this->validate($request,[
            'tipo'=>'required',
            'numt'=>'required|regex:/^[0-9]{4}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}$/',
            'cvv'=>'required|regex:/^[0-9]{3}$/'
        ]);

        $result = \DB::select("
            SELECT SUM(md.cantidad * md.precio) AS total
            FROM detallecompras AS md
            WHERE md.idcompra = $request->idcompra");

        // Obtén el total del resultado (puede haber más de una columna, así que accedemos al primer elemento del array)
        $totalventa = $result[0]->total;

        $ventas = compras::find($request->idcompra);

        // Convierte el valor en un decimal
        $totalventaDecimal = (float) $totalventa;

        // Asigna el valor al campo total
        $ventas->total = $totalventaDecimal;
        $ventas->fecha = $request->fecha;
        $ventas->idcliente = $request->idcliente;
        $ventas->idprove = $request->idprove;

        $ventas->save();

        Session::flash('mensaje',"Compra $request->idcompra registrada");
            return redirect()->route('reportecompras'); //CAMBIAR AL REPORTE DE COMPRA

        }
    }

    public function reportecompras(){
        $consultar = compras::all();
        return view('sistema.reportecompras')
        ->with('consultar',$consultar);
    }


}
