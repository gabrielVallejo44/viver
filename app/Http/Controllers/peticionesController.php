<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peticiones;
Use App\Models\usuario;
class peticionesController extends Controller
{
    public function sacarPeticiones(){
        $receptor=session('usuario');
        $peticionesAux = peticiones::where('receptor', $receptor->id)->get();
        $peticiones=array();
        foreach($peticionesAux as $peticionAux){
            $peticion=new peticiones; //REVISAR PORQUE AQUÍ SE LLAMA PETICIONES Y NO PETICION EL MODELO
            $peticion->id=$peticionAux->id;
            $peticion->emisor=$peticionAux->emisor;
            $peticion->mensaje=$peticionAux->mensaje;
            $peticion->receptor=$peticionAux->receptor;
            array_push($peticiones, $peticion);
        }
        
        session(['peticiones' => $peticiones]);
        return view('peticiones');
    }
    public function agregarPeticion(Request $request){
        $emisor=session('usuario');
        $peticionAux=new peticiones; //REVISAR PORQUE AQUÍ SE LLAMA PETICIONES Y NO PETICION EL MODELO
        $peticionAux->emisor=$emisor->id;
        $peticionAux->mensaje="¿Quieres vivir conmigo?";
        $peticionAux->receptor=(int)(decrypt($request->receptor));
        $peticionAux->save();
        return view('usuario.usuarioBuscaCompañeros');
    }
}
