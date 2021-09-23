<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    public function index(){
        $motivo_contatos = MotivoContato::all();
        
        return view ('site.contato' , ['motivo_contatos'=>$motivo_contatos]);
    }

    public function save(Request $request){
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);


        $contato = new SiteContato();
        $contato->create($request->all());
        
    }
}
