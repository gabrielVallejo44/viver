<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\casa;
use App\Models\imagenesCasa;

class casaController extends Controller
{
    public function sacarCasa(){
        $usuario=session('usuario');
        if (!isset($usuario)) {
            return view('welcome');
        } else {
        
            $casaUsuarioAux = casa::where('propietario', $usuario->id)->get();
            if ($casaUsuarioAux->count()<1){
                //MOSTRAMOS QUE NO TIENE CASA ASOCIADA
                return view('miCasa', ['casa'=>null]);
            }else{
                $casa=new casa;
                $casa->id=$casaUsuarioAux->id;
                $casa->nombre=$casaUsuarioAux->nombre;
                $casa->propietario=$casaUsuarioAux->propietario;
                $casa->direccion=$casaUsuarioAux->direccion;
                $casa->localidad=$casaUsuarioAux->localidad;
                $casa->aforoActual=$casaUsuarioAux->aforoActual;
                $casa->aforo=$casaUsuarioAux->aforo;
                $casa->lleno=$casaUsuarioAux->lleno;
                return view('miCasa', ['casa'=>$casas]);
            }
        }
        
    }

    public function agregarCasa(Request $request){
        $usuario=session('usuario');
        $casa=new casa;
        $casa->nombre=$request->nombreCasa;
        $casa->descripcion=$request->descripcionCasa;
        $casa->propietario=$usuario->id;
        $casa->direccion=$request->direccionCasa;
        $casa->localidad=$request->localidadCasa;
        $casa->aforoActual="1";
        $casa->aforo=$request->aforoCasa;
        $casa->lleno="0";
        $casa->save();
        if($request->hasFile('fotosCasa')){
            $imagenesCasa=new imagenesCasa();
            $imagenesCasa->casa=$casa->id;
            $imagenesCasaAux=$request->file('fotosCasa');
            $imagenesCasa->imagenes="";
            foreach($imagenesCasaAux as $imagen){
                $nombreImagenAux=time() . '-' . $imagen->getClientOriginalName();
                $imagenesCasa->imagenes .= "$$" . time() . '-' . $imagen->getClientOriginalName();
                $destino='storage/imagenes_casa/';
                $upload=$imagen->move($destino, $nombreImagenAux);
                
               
           }
           $imagenesCasa->save();
           
          }
          
          
         


    }
}
