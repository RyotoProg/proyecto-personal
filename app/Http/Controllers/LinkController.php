<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //metodo para guardar el link en la base de datos
    public function createLink(Request $request){

        $this->validate(request(), [
            'nombre' => 'required',
            'link' => 'required'
        ]);

        $iduser = auth()->user()->id;
        $id= date("j").''.date("n").''.date("Y").''.date('g').''.date('i').''.date('s');

        Link::create(['id'=>$id,'nombre'=>$request->nombre, 'link'=>$request->link, 'id_user'=>$iduser]);
        return redirect()->to('/')->with('success', "Link guardado con exito");
    }

    //metodo para obtener la informacion de un link y mandarla a la vista de edit
    public function pageEditLink($id){
        $link= Link::findOrFail($id);
        return view('link.edit', compact('link'));
    }

    //metodo para actualizar el link en la base de datos
    public function editLink(Request $request, $id){
        $this->validate(request(), [
            'nombre' => 'required',
            'link' => 'required'
        ]);

        $datos = request()->except(['_token', '_method']);
        Link::where('id','=',$id)->update($datos);

        return redirect()->to('/')->with('success', "Link editado con exito");
    }

    //metodo para eliminar el link de la base de datos
    public function destroyLink($id){
        Link::destroy($id);

        return redirect()->to('/')->with('success', "Link eliminado con exito");
    }
}
