<div class="menu">
    <ul>
        @if (isset($show)) 
            <li>
                <a href="{{ route("app.$rota") }}">Voltar</a>
            </li>
        @else
            <li>
                <a href="{{ route("app.$rota.create") }}">Novo</a>
            </li>
        @endif

        <li>
            <a href="{{ route("app.$rota") }}">Consulta</a>
        </li>
    </ul>
</div>
