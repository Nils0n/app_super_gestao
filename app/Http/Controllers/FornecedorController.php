<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.fornecedor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'uf' => 'required| max: 2 |min: 2'
        ];

        $messages = [
            'name.required' => 'O campo nome é obrigatório!',
            'name.min' => 'O nome deve possuir no mínimo 3 caracteres',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'Informe um email',
            'uf.required' => 'O campo UF é obrigatório',
            'uf.max' => 'O campo UF deve possuir apenas 2 caracteres',
            'uf.min' => 'O campo UF deve possuir apenas 2 caracteres'
        ];

        $request->validate($rules , $messages);
        
        try{
            Fornecedor::create([
                'nome' => $request->input('name'),
                'uf' => $request->input('uf'),
                'site' => $request->input('site'),
                'email' => $request->input('email'),
            ]);
        }catch(Exception $e){
            return back()->withErrors(['errors' => 'Falha ao cadastrar, verifique os dados e tente novamente']);
        }

        return redirect()->route('app.fornecedor.create')->with('success' , 'Fornecedor cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {   
        $fornecedores = Fornecedor::where('nome' , 'like' , '%'.$request->input('name').'%')
            ->where('site' , 'like' , '%'.$request->input('site').'%')
            ->where('uf' , 'like' , '%'.$request->input('uf').'%')
            ->where('email' , 'like' , '%'.$request->input('email').'%')
            ->paginate(2);

        return view('app.fornecedor.list' , compact('fornecedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'uf' => 'required| max: 2 |min: 2'
        ];

        $messages = [
            'name.required' => 'O campo nome é obrigatório!',
            'name.min' => 'O nome deve possuir no mínimo 3 caracteres',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'Informe um email',
            'uf.required' => 'O campo UF é obrigatório',
            'uf.max' => 'O campo UF deve possuir apenas 2 caracteres',
            'uf.min' => 'O campo UF deve possuir apenas 2 caracteres'
        ];

        $request->validate($rules , $messages);
        try{

            $fornecedor->update([
                'nome' => $request->input('name'),
                'uf' => $request->input('uf'),
                'site' => $request->input('site'),
                'email' => $request->input('email'),
            ]);
        }catch(Exception $e){
            return back()->withErrors(['errors' => 'Falha ao cadastrar, verifique os dados e tente novamente']);
        }
        return redirect()->route('app.fornecedor')->with('success' , 'Fornecedor atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
