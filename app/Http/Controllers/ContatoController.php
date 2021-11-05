<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;
use Exception;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'motivo_contato.required' => 'O motivo do contato é obrigatório',
            'mensagem.required' => 'A mensagem é obrigatória',
            'mensagem.max' => 'So é permitidos mensagens de no máximo 2000 caracteres'

        ];

        $request->validate($rules, $messages);

        try {

            SiteContato::create($request->all());
        } catch (Exception $e) {
            return back();
        }

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
