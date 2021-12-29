@extends('app.layouts.basico')

@section('title', 'Produto Detalhe')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Detalhes do Produto</p>
        </div>

        @component('components.menu-app', ['rota' => 'produto'])

        @endcomponent
        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{ route('app.produto-detalhe.update', ['id' => $produto_detalhe->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <select name="produto_id" id="" disabled>
                        <option value="{{$produto_detalhe->produto_id}}">{{ $produto_detalhe->produto->nome }}</option>
                    </select>

                    <input type="number" class="borda-preta" name="length" placeholder="Comprimento" min="0"
                        value="{{ $produto_detalhe->comprimento }}" required>
                    <input type="number" class="borda-preta" name="width" placeholder="Largura" min="0"
                        value="{{ $produto_detalhe->largura }}" required>
                    <input type="number" class="borda-preta" name="height" placeholder="Altura" min="0"
                        value="{{ $produto_detalhe->altura }}" required>

                    <select name="unidade_id" id="unidade_id">
                        <option value="">Selecione a unidade</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"
                                {{ $unidade->id == $produto_detalhe->unidade_id ? 'selected' : '' }}>
                                {{$unidade->descricao}}
                            </option>
                        @endforeach
                    </select>

                    <button class="borda-preta" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
