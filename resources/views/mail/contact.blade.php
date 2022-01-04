@component('mail::message')
<h1>Contato Via App Super Gestão</h1>

<p><strong>{{$contact->nome}}</strong> entrou em contato via  Super Gestão,</p> 
<p>seu motivo de contato foi: <b>{{$contact->motivoContato->motivo_contato}}</b></p>
<p>Telefone para contato: <b>{{$contact->telefone}}</b> </p>  
<h2>Deixou a seguinte mensagem:</h2>
<p class="message">{{$contact->mensagem}}</p>


<img src="http://www.iamit.com.br/wp-content/uploads/2020/08/Suporte-tecnico-em-TI.jpg" class="img-content" alt="" srcset="">

@component('mail::button', ['url' => 'mailto:'.$contact->email])
Responder Email
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
