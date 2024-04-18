<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\categorias;
use App\Models\pedidos;
use Session;

class productoscontroller extends Controller
{
    //public function altaproductos(){
        //$productos = productos::all();
        //return view ('sistema/altaproductos');
    //}
    
    public function altaproductos()
    {
    $sessionidu = session('sessionidu');
    if($sessionidu != ""){
    $categorias = categorias::orderby('nombre','asc')
                        ->get();
    $productos = productos::orderby('nombre','asc')
                        ->get();

    //dd($productos); 

    return view ('sistema/altaproductos')
        ->with('categorias',$categorias)
        ->with('productos',$productos);
    }
    else{
        Session::flash('mensaje', "Favor de loguearse, antes de continuar"); #Sirve solo una vez
        return redirect()->route('login');      
    }

    }
    
/*---------------------------------------------------------------------------------------------*/
    public function guardarproducto(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'descripcion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'precio'=>'required',
            'talla'=>'required',
            'genero' => 'required',
            'color'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'archivo'=>'required|mimes:jpg,png,jpeg'
        ]);

        $file = $request->file('archivo');
        if($file !=""){
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = "no-photo.jpg";
        }


        $productos = new productos;
        $productos->nombre = $request->nombre;
        $productos->descripcion=$request->descripcion;
        $productos->idcate=$request->idcate;
        $productos->precio = $request->precio;
        $productos->talla = $request->talla;
        $productos->genero = $request->genero;
        $productos->color = $request->color;
        $productos->archivo=$img2;
        $productos->save();
        
        Session::flash('mensaje', "El registro $request->nombre ha sido modificado correctamente"); #Sirve solo una vez
        return redirect()->route('reporteproducto');
    }

    
/*---------------------------------------------------------------------------------------------*/
    public function reporteproducto()
    {
        $sessiontipo = session('sessiontipo');
        $sessionidu = session('sessionidu');
        if($sessionidu != "" and $sessiontipo != ''){  
        $reporte = productos::select('productos.idpro','productos.nombre as nproducto','productos.descripcion','productos.precio','productos.talla', 'productos.genero',            'productos.color',
                                    'productos.archivo','productos.activo','categorias.nombre as ncategoria')
                            ->join('categorias','categorias.idcate','=','productos.idcate')
                            ->orderby('productos.nombre')
                            ->get();
        return view ('sistema/reporte')
        ->with('reporte',$reporte)
        ->with('sessiontipo',$sessiontipo);
        }
        else{
            Session::flash('mensaje', "Favor de loguearse, antes de continuar"); #Sirve solo una vez
            return redirect()->route('login');
        }
    }

    public function desactivaproducto($idpro){
        $productos = productos::find($idpro);
        $productos->activo="No";
        $productos->save();
        Session::flash('mensaje', "El producto $idpro ha pasado a Inactivo");
        return redirect()->route('reporteproducto');
    }

    public function activaproducto($idpro){
        $productos = productos::find($idpro);
        $productos->activo="Si";
        $productos->save();
        Session::flash('mensaje', "El producto $idpro ha pasado a Activo");
        return redirect()->route('reporteproducto');
    }

/*---------------------------------------------------------------------------------------------*/
    public function editarproducto(Request $request)
    {
        $productos = productos::find($request->idpro);

        $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'descripcion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'precio'=>'required',
            'talla'=>'required',
            'genero'=>'required',
            'color'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'archivo'=>'required|mimes:jpg,png,jpeg',
            'idcate'=>'required'
        ]);

        $file = $request->file('archivo');
        if($file !=""){
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        //dd($r->getMessage()); 

        $productos = productos::find($request->idpro);
        $productos->nombre = $request->nombre;
        $productos->descripcion=$request->descripcion;
        $productos->precio = $request->precio;
        $productos->talla = $request->talla;
        $productos->genero = $request->genero;
        $productos->color = $request->color;
        $productos->idcate = $request->idcate;
        if($file !=""){
            $productos->archivo = $img2; 
        }
        $productos->save();
        Session::flash('mensaje', "El registro $request->nombre ha sido modificado correctamente"); #Sirve solo una vez
        return redirect()->route('reporteproducto'); 
    }

/*---------------------------------------------------------------------------------------------*/
    public function modificaproducto($idpro)
    {
        $sessionidu = session('sessionidu');
        if($sessionidu != ""){

        $infoProducto = \DB::table('productos AS p')
            ->join('categorias AS c', 'c.idcate', '=', 'p.idcate')
            ->select('p.idpro', 'p.nombre', 'p.descripcion', 'c.nombre AS ncategoria', 'p.precio', 'p.talla','p.genero', 'p.color', 'p.archivo', 'p.activo', 'p.idcate')
            ->where('p.idpro', $idpro)
            ->first();

        //if (!$infoProducto) {
            // Manejar el caso en el que no se encuentra el producto
            //return redirect()->route('reporteproducto'); // Redirigir a una página de error o a otra vista
        //}

        $idtengo = $infoProducto->idcate;
        $idttengo = $infoProducto->idcate;
        $categorias = categorias::where('idcate', '!=', $idttengo)
                            ->get();

        return view('sistema/modificaproducto')
            ->with('infoProducto', $infoProducto)
            ->with('categorias', $categorias);
        }
        else{
            Session::flash('mensaje', "Favor de loguearse, antes de continuar"); #Sirve solo una vez
            return redirect()->route('login');    
        }
    }
/*---------------------------------------------------------------------------------------------*/

    public function eliminaproducto($idpro)
    {
    $productos = productos::find($idpro);
    $productos->delete();
    
    return redirect()->route('reporteproducto');
    }

/*---------------------------------------------------------------------------------------------*/
    public function principal(){
        return view('sistema/principal');
    }

}


