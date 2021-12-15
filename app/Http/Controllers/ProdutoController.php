<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all(); 

        return view('app.produto.index' , compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto.create' , compact('unidades'));
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
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required |min:1',
            'unidade_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Campo nome é obrigatório',
            'description.required' => 'Campo descrição é obrigatório',
            'weight.required' => 'Campo peso é obrigatório',
            'weight.min' => 'O peso mínimo é 1 kg ',
            'unidade.required' => 'Campo unidade é obrigatório',
        ];

        $request->validate($rules , $messages);
        Produto::create([
            'nome' => $request->input('name'),
            'descricao' => $request->input('description'),
            'peso' => $request->input('weight'),
            'unidade_id' => $request->input('unidade_id'),
        ]);

        try{

        }catch(Exception $e){
            return back()->withErrors(['errors' => 'Houve algum erro ao adicionar o produto, verifique os campos e tente novamente']);
        }

        return redirect()->route('app.produto')->with('success' , 'Produto adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        return view('app.produto.show' , compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $unidades = Unidade::all();


        return view('app.produto.edit' , compact('produto' , 'unidades'));
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
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required |min:1',
        ];

        $messages = [
            'name.required' => 'Campo nome é obrigatório',
            'description.required' => 'Campo descrição é obrigatório',
            'weight.required' => 'Campo peso é obrigatório',
            'weight.min' => 'O peso mínimo é 1 kg ',
        ];

        $request->validate($rules , $messages);
        $produto = Produto::find($id);

        try{
            $produto->update([
                'nome' => $request->input('name'),
                'descricao' => $request->input('description'),
                'peso' => $request->input('weight'),
                'unidade_id' => $request->input('unidade_id') == null ? $produto->unidade_id : $request->input('unidade_id'),
            ]);
        }catch(Exception $e) {
            return back()->withErrors(['errors' => 'Houve algum erro ao adicionar o produto, verifique os campos e tente novamente']);

        }

        return redirect()->route('app.produto.show' , ['id' => $produto->id])->with('success' , 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('app.produto')->with('success' , 'Produto deletado com sucesso.');
    }
}
