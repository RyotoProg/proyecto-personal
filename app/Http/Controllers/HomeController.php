<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Link;

class HomeController extends Controller
{
    public function Home(Request $request){
        $iduser = auth()->user()->id;
        $notas['notas'] = Nota::where('id_user','=',$iduser)->get();
        $links['links'] = Link::where('id_user','=',$iduser)->get();
        return view('home', $notas, $links);
    }
}
