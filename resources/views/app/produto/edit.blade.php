@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        @component('components.menu-app', ['rota' => 'produto'])

        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{ route('app.produto.update', ['id' => $produto->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="text" class="borda-preta" name="name" placeholder="Nome" value="{{ $produto->nome }}"
                        required>
                    <input type="text" class="borda-preta" name="description" placeholder="Descrição"
                        value="{{ $produto->descricao }}" required>
                    <input type="number" class="borda-preta" name="weight" placeholder="Peso em kg" min="1"
                        value="{{ $produto->peso }}" required>
                    <input type="text" disabled value="{{ $produto->fornecedor }}">

                    <select name="fornecedor_id" id="">
                        <option value="">Selecione o fornecedor</option>
                        @foreach ($fornecedores as $fornecedor)
                            <option
                                value="{{ $fornecedor->id }} {{ $produto->fornecedor_id == $fornecedor->id ? 'selected' : '' }}">
                                {{ $fornecedor->nome }}</option>
                        @endforeach
                    </select>


                    <select name="unidade_id" id="unidade_id">
                        <option value="">Selecione a unidade</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"
                                {{ $produto->unidade_id == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>

                    <button class="borda-preta" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
