<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function createLink(Request $request){

        $this->validate(request(), [
            'nombre' => 'required',
            'link' => 'required'
        ]);

        $iduser = auth()->user()->id;
        $id= date("j").''.date("n").''.date("Y").''.date('g').''.date('i').''.date('s');

        Link::create(['id'=>$id,'nombre'=>$request->nombre, 'link'=>$request->link, 'id_user'=>$iduser]);
        return redirect()->to('/');
    }

    public function pageEditLink($id){
        $link= Link::findOrFail($id);
        return view('link.edit', compact('link'));
    }

    public function editLink(Request $request, $id){
        $this->validate(request(), [
            'nombre' => 'required',
            'link' => 'required'
        ]);

        $datos = request()->except(['_token', '_method']);
        Link::where('id','=',$id)->update($datos);

        return redirect()->to('/');
    }

    public function destroyLink($id){
        Link::destroy($id);

        return redirect()->to('/');
    }
}
