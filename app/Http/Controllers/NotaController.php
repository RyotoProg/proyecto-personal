<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function createNote(Request $request){

        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $iduser = auth()->user()->id;
        $id= date("j").''.date("n").''.date("Y").''.date('g').''.date('i').''.date('s');

        Nota::create(['id'=>$id,'nombre'=>$request->nombre, 'descripcion'=>$request->descripcion, 'id_user'=>$iduser]);
        return redirect()->to('/')->with('success', "Nota guardada con exito");
    }

    public function pageEditNote($id){
        $nota= Nota::findOrFail($id);
        return view('nota.edit', compact('nota'));
    }

    public function editNote(Request $request, $id){
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $datos = request()->except(['_token', '_method']);
        Nota::where('id','=',$id)->update($datos);

        return redirect()->to('/')->with('success', "Nota editada con exito");
    }

    public function destroyNote($id){
        Nota::destroy($id);

        return redirect()->to('/')->with('success', "Nota eliminada con exito");
    }
}
