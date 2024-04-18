<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\usuarios;
use Session;


class logincontroller extends Controller
{

    public function cerrarsesion(){
        Session::forget('sessionusuario'); //elimina el contenido de la sesion usuario
        Session::forget('sessiontipo');
        Session::forget('sessionidu');
        Session::flush();
        Session::flash('mensaje', "Sesion cerrada correctamente"); #Sirve solo una vez
        return redirect()->route('login');  

    }

    // public function principal(){

    //     $sessionidu = session('sessionidu');
    //     if($sessionidu != ""){
    //         return view("sistema.principal");
    //     }
    //     else{
    //         Session::flash('mensaje', "Favor de loguearse, antes de continuar"); #Sirve solo una vez
    //         return redirect()->route('login');
    //     }
    // }
    
    public function principal(){
        return view("sistema.principal");
    }
    



    public function login(){
        return view('sistema.login');
    }

    


    // public function validar(Request $request){

    //     $this -> validate($request,[

    //         'usuario' => 'required',
    //         'pasw' => 'required',

    //     ]);
    //     //$paswordEncriptado = Hash::make($request->pasw); //Encriptar lo que recibimos del request*/
    //     //echo $paswordEncriptado;
    //     $consulta = usuarios::where('user',$request->usuario)
    //                         ->where('activo','si')
    //                         ->get();
    //     $cuantos = count($consulta);
    //     //echo($consulta);
    //     if($cuantos == 1 and Hash::check($request->pasw,$consulta[0]->pasw)){
    //         // echo("DESDE IF");
    //         // echo($consulta);
    //         //dd($consulta); 
    //         Session::put('sessionusuario',$consulta[0]->nombre . ' ' .$consulta[0]->apellido);
    //         Session::put('sessiontipo',$consulta[0]->tipo);
    //         Session::put('sessionidu',$consulta[0]->idu);
    //         return redirect()->route('principal');
            
    //     }
    //     else{

    //         Session::flash('mensaje', "El usuario o la contraseña no son correctos"); #Sirve solo una vez
    //         return redirect()->route('login');
    //         // echo("DESDE ELSE");           
    //         // echo($consulta);            
    //     }
    // }


    public function validar(Request $request){
        $consulta = usuarios::where('user', $request->usuario)
                            ->where('activo', 'si')
                            ->get();
        $cuantos = count($consulta);
        if($cuantos == 1){
            Session::put('sessionusuario', $consulta[0]->nombre . ' ' .$consulta[0]->apellido);
            Session::put('sessiontipo', $consulta[0]->tipo);
            Session::put('sessionidu', $consulta[0]->idu);
            return redirect()->route('principal');
        } else {
            Session::flash('mensaje', "El usuario o la contraseña no son correctos");
            return redirect()->route('login');
        }
    }
    
}