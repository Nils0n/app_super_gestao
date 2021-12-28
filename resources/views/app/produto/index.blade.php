@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        @component('components.menu-app', ['rota' => 'produto'])
            
        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 90%; margin:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade id</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso}}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td> <a href="{{route('app.produto.show', ['id' => $produto->id])}}">Visualizar</a></td>
                                <td>
                                    <form id="form-delete-{{$produto->id}}" action="{{route('app.produto.destroy' ,['id' => $produto->id] )}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="#" onclick="document.getElementById('form-delete-{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                    
                                </td>
                                <td> <a href="{{route('app.produto.edit', ['id' => $produto->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
