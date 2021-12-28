@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Criar Produto</p>
        </div>
        
        @component('components.menu-app', ['rota' => 'produto'])
            
        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{route('app.produto.create')}}" method="post">
                    @csrf

                    <input type="text" class="borda-preta" name="name" placeholder="Nome" required>
                    <input type="text" class="borda-preta" name="description" placeholder="Descrição" required>
                    <input type="number" class="borda-preta" name="weight" placeholder="Peso em kg" min="1" required>

                    <select name="unidade_id" id="unidade_id" required>
                        <option value="">Selecione a unidade</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                        @endforeach
                    </select>

                    <button class="borda-preta" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
