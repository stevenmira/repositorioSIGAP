<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use sigafi\Http\Requests;

class ETLController extends Controller
{
    public function ETL(){
        $usuarioactual=\Auth::user();
        $cartera = DB::connection('bdtra')->table('cartera')
        ->get();
        $cliente = DB::connection('bdtra')->table('cliente')
        ->get();

        DB::table('cliente')->delete();
        DB::table('cartera')->delete();
       
        foreach ($cartera as $cartera) 
        { 
    
            DB::connection('pgsql')->table('cartera')->insert(
                ['idcartera' => $cartera->idcartera, 'nombre' =>$cartera->nombre,
                'estado'=>$cartera->estado,'ejecutivo'=>$cartera->ejecutivo,
                'supervisor'=>$cartera->supervisor,'created_at'=>$cartera->created_at,
                'updated_at'=>$cartera->updated_at]
            );
            DB::commit();

        }

    foreach ($cliente as $cliente) { 
    
        DB::connection('pgsql')->table('cliente')->insert(
            ['idcliente'=>$cliente->idcliente,'idcartera' => $cartera->idcartera, 'nombre' =>$cliente->nombre,
            'apellido'=>$cliente->apellido,'dui'=>$cliente->dui,'nit'=>$cliente->nit,
            'estado'=>$cliente->estado,'created_at'=>$cartera->created_at,
            'updated_at'=>$cartera->updated_at]
        
        );
        DB::commit();
    
}
    //fin DE PRUEBA DE LLENADO
    return view('/layouts/inicio')->with("usuarioactual",  $usuarioactual);
       

    }
}
