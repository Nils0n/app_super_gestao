<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Exception;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();

        return view('app.produto-detalhe.create', compact('unidades', 'produtos'));
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
            'produto_id' => 'required',
            'length' => 'required|min:0',
            'width' => 'required|min:0',
            'height' => 'required|min:0',
            'unidade_id' => 'required|min:0',
        ];

        $messages = [
            'produto_id.required' => 'Por favor selecione um produto',
            'length.required' => 'Informe um comprimento',
            'lenght.min' => 'Não são permitidos valores menor que zero',
            'width.required' => 'A largura é obrigatória',
            'width.min' => 'Não são permitidos valores menor que zero',
            'height.required' => 'A altura é obrigatória',
            'height.min' => 'Não são permitidos valores menor que zero',
            'unidade_id.required' => 'É obrigatório selecionar uma unidade',
        ];

        $request->validate($rules, $messages);

        try {

            ProdutoDetalhe::create([
                'produto_id' => $request->input('produto_id'),
                'comprimento' => $request->input('length'),
                'largura' => $request->input('width'),
                'altura' => $request->input('height'),
                'unidade_id' => $request->input('unidade_id'),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['errors' => 'Houve algum erro, verifique os dados e tente novamente']);
        }

        return back()->with('success', 'Detalhes adicionado ao produto com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        $produto_detalhe = ProdutoDetalhe::find($id);

        return view('app.produto-detalhe.edit', compact('produto_detalhe', 'unidades' , 'produto_detalhe'));
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
        $produto_detalhe = ProdutoDetalhe::find($id);

        $rules = [
            'length' => 'required|min:0',
            'width' => 'required|min:0',
            'height' => 'required|min:0',
            'unidade_id' => 'required|min:0',
        ];

        $messages = [
            'length.required' => 'Informe um comprimento',
            'lenght.min' => 'Não são permitidos valores menor que zero',
            'width.required' => 'A largura é obrigatória',
            'width.min' => 'Não são permitidos valores menor que zero',
            'height.required' => 'A altura é obrigatória',
            'height.min' => 'Não são permitidos valores menor que zero',
            'unidade_id.required' => 'É obrigatório selecionar uma unidade',
        ];

        $request->validate($rules, $messages);

        $produto_detalhe->update([
            'comprimento' => $request->input('length'),
            'largura' => $request->input('width'),
            'altura' => $request->input('height'),
            'unidade_id' => $request->input('unidade_id'),
        ]);

        return redirect()->route('app.produto')->with('success' , 'Produto Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto_detalhe = ProdutoDetalhe::find($id);
        $produto_detalhe->delete();
    }
}
