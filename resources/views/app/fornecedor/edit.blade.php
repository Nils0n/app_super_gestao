@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Fornecedor</p>
        </div>
        
        @include('app.layouts.partials.menu-fornecedor')

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{route('app.fornecedor.update' , ['id' => $fornecedor->id])}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="text" class="borda-preta" name="name" placeholder="Nome" value="{{$fornecedor->nome}}" >
                    <input type="text" class="borda-preta" name="site" placeholder="Site" value="{{$fornecedor->site}}">
                    <input type="text" class="borda-preta" name="uf" placeholder="UF" value="{{$fornecedor->uf}}">
                    <input type="email" class="borda-preta" name="email" placeholder="Email" value="{{$fornecedor->email}}">

                    <button class="borda-preta" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
