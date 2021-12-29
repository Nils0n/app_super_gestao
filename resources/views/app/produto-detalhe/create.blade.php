@extends('app.layouts.basico')

@section('title', 'Deatalhes do Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes do Produto</p>
        </div>

        @component('components.menu-app', ['rota' => 'produto'])

        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{ route('app.produto-detalhe.store') }}" method="post">
                    @csrf

                    <select name="produto_id" id="">
                        <option value="">Selecione um produto</option>
                        @foreach ($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </select>

                    <input type="number" class="borda-preta" name="length" placeholder="Comprimento" min="0" required>
                    <input type="number" class="borda-preta" name="width" placeholder="Largura" min="0" required>
                    <input type="number" class="borda-preta" name="height" placeholder="Altura" min="0" required>

                    <select name="unidade_id" id="unidade_id" required>
                        <option value="">Selecione a unidade</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>

                    <button class="borda-preta" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
