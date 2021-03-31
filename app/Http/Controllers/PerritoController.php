<?php

namespace App\Http\Controllers;

use App\Models\Perrito;
use Illuminate\Http\Request;

class PerritoController extends Controller
{
    

    public function inicio() {
        $perritos = Perrito::all();
        return view('infoPerritos', compact('perritos'));
    }


    public function crear(Request $request) {

        $perritoNuevo = new Perrito;
        Perrito::create([
            'nombre' =>  $request->get('nombre'),
            'color' =>  $request->get('color'),
            'raza'=> $request->get('raza')
        ]);
    }


    public function editar($id){
        $perrito = Perrito::findOrFail($id);
        return view('editar', compact('perrito'));
    }

    public function actualizar(Request $request){

        $perrito = Perrito::findOrFail($request->id);
        
        $perrito->nombre = $request->nombre;
        $perrito->color = $request->color;
        $perrito->raza = $request->raza;

        $perrito->save();
    }   


    
    public function eliminar(Request $request){
        $Perritos = Perrito::find($request->id);  
        $Perritos->delete();
    }

}
