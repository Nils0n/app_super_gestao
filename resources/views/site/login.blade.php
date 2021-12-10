@extends('site.layouts.basico')

@section('title', $titulo)

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin:auto;">
                <form action="{{route('site.login.authenticate')}}"  method="POST">
                    @csrf
    
                    <input type="text" name="login" class="borda-preta" placeholder="Login">
                    <input type="password" name="password" id="passwor" class="borda-preta" placeholder="Senha">
                    <button class="borda-preta" type="submit">Acessar</button>
                </form>
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{asset('image/facebook.png')}}">
            <img src="{{asset('image/linkedin.png')}}">
            <img src="{{asset('image/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{asset('image/mapa.png')}}">
        </div>
    </div>
@endsection

