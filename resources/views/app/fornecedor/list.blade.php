@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de Fornecedores</p>
        </div>

        @include('app.layouts.partials.menu-fornecedor')

        <div class="informacao-pagina">
            <div class="" style="width: 90%; margin:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>
                                    <form id="form-delete-{{ $fornecedor->id }}"
                                        action="{{ route('app.fornecedor.destroy', ['id' => $fornecedor->id]) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="#"  onclick="document.getElementById('form-delete-{{ $fornecedor->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td> <a href="{{ route('app.fornecedor.edit', ['id' => $fornecedor->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
