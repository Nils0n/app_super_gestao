@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Criar Fornecedor</p>
        </div>
        
        @component('components.menu-app' , ['rota' => 'fornecedor'])

        @endcomponent

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{route('app.fornecedor.store')}}" method="post">
                    @csrf

                    <input type="text" class="borda-preta" name="name" placeholder="Nome" >
                    <input type="text" class="borda-preta" name="site" placeholder="Site">
                    <input type="text" class="borda-preta" name="uf" placeholder="UF">
                    <input type="email" class="borda-preta" name="email" placeholder="Email">

                    <button class="borda-preta" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
