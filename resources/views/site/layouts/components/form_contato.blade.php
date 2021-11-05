{{$slot}}
<form action="{{route('site.contato.store')}}" method = "post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
     @error('data.nome') <small class="error">{{ $message }}</small> @enderror
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
     @error('data.telefone') <small class="error">{{ $message }}</small> @enderror
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
     @error('data.email') <small class="error">{{ $message }}</small> @enderror
    <br>
    <select name="motivo_contato" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }} >{{$motivo_contato->motivo_contato}}</option>
        @endforeach
         @error('data.motivo_contato') <small class="error">{{ $message }}</small> @enderror
    </select>
    <br>
    <textarea name="mensagem" value="{{old('mensagem')}}" class="{{$classe}}" placeholder="Preencha aqui sua Mensagem"></textarea>
     @error('data.mensagem') <small class="error">{{ $message }}</small> @enderror
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>