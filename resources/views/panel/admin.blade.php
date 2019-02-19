@extends('layouts.default')
@section('navbar')
<nav class="navbar">
	@include("components/navbar_1-admin")
	@include("components/navbar_2-admin")
</nav>
@endsection
@section('main_content')
<div class="container" style="margin-top: 3em;">
<h3>Usuários:</h3>
<table style="max-height: 500px;overflow: auto;" width="100%;">
	<tr style="background-color:#FAFAFA;">
		<td>ID</td>
		<td>Nick</td>
		<td>E-mail</td>
	</tr>
	<tr>
		@if(count($users) >0)
		@foreach($users as $user)
			<td>{{$user->id}}</td>
			<td>{{$user->nick}}</td>
			<td>{{$user->email}}</td>
		@endforeach
		@else
		<td colspan="3" rowspan="3">Nenhum usuario cadastrado.</td>
		@endif
	</tr>
</table>

<div style="height: 50px;width: 100%;"></div>
<h3>Mensagens:</h3>
<table style="max-height: 500px;overflow: auto;" width="100%;">
	<tr style="background-color:#FAFAFA;">
		<td>ID</td>
		<td>Nick</td>
		<td>Subject</td>
		<td>Message</td>
		<td>Created</td>
	</tr>
	<tr>
			    @each('messenger.partials.thread-admin', $threads, 'thread', 'messenger.partials.no-threads')


	</tr>
</table>
<div style="height: 50px;width: 100%;"></div>

<h3>Anuncios de Personagems:</h3>
<table style="max-height: 500px;overflow: auto;" width="100%;">
	<tr style="background-color:#FAFAFA;">
		<td>ID</td>
		<td>Usernick</td>
		<td>Character Name</td>
		<td>Postado dia</td>
	</tr>
	<tr>
		@if(count($chars) >0)
		@foreach($chars as $char)
			<td>{{$char->id}}</td>
			<td>{{usernick($char->user_id)}}</td>
			<td>{{$char->name}}</td>
			<td>{{$char->created_at}}</td>
		@endforeach
		@else
		<td colspan="3" rowspan="3">Nenhum personagem anunciado.</td>
		@endif
	</tr>
</table>
<div style="height: 50px;width: 100%;"></div>

<div class="form-group col-sm-4">
	<h3>Ativar Anuncio:</h1>
	<form action="/control-panel/admin/ativar-anuncio" method="POST">
		{{csrf_field()}}
		<label for="to"></label>
		<select name="charid" id="to" class="form-control">
			@foreach($charsoff as $c)
			<option value="{{$c->id}}"><b>[{{$c->id}}] [{{usernick($c->user_id)}}]</b> {{$c->name}}</option>
			@endforeach
		</select>
		
		<label for="pacote">Pacote:</label>
		<select name="pacote" id="pacote" class="form-control">
			<option value="1"><b>[15 dias] Simples</b></option>
			<option value="2"><b>[30 dias] Especial</b></option>
		</select>
	<div class="form-group" style="margin-top:20px;">
	<button type="submit" class="btnred" onclick="if(confirm('Tem certeza disto?'));">Ativar anuncio</button>
	</div>
	</form>
</div>
</div>
@endsection