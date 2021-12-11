@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        @include('app.layouts.partials.menu-fornecedor')

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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produtos)
                            <tr>
                                <td>{{ $produtos->nome }}</td>
                                <td>{{ $produtos->descricao }}</td>
                                <td>{{ $produtos->peso}}</td>
                                <td>{{ $produtos->unidade_id }}</td>
                                <td> <a href="">Excluir</a></td>
                                <td> <a href="">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
