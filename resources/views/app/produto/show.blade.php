@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Produto</p>
        </div>
        
        @component('components.menu-app', ['rota' => 'produto', 'show'=> true])
            
        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto; text-align:left">
                <table border="1">
                    <tr>
                        <td>ID: </td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome: </td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Peso: </td>
                        <td>{{$produto->peso}} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de medida:</td>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
