<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', compact('motivo_contatos'));
    }

    public function store(Request $request)
    {   

        $rules = [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'motivo_contato_id.required' => 'O motivo do contato é obrigatório',
            'mensagem.required' => 'A mensagem é obrigatória',
            'mensagem.max' => 'So é permitidos mensagens de no máximo 2000 caracteres'

        ];

        $request->validate($rules, $messages);

        try {

          $contact =  SiteContato::create($request->all());

        } catch (Exception $e) {
            dd('erro' . $e);
            return back();
        }
      
        Mail::to('nilson.batista@softmakers.me')->send(new ContactMail($contact));

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
