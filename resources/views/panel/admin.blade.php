@extends('layouts.default')
@section('navbar')
<nav class="navbar">
	@include("components/navbar_1-admin")
	@include("components/navbar_2-admin")
</nav>
@endsection
@section('background-pg', 'background-color:#e9eaee !important;background-image:none;')

@section('main_content')

<div class="container" style="margin-top: 3em;">
	@if (Session::has('error'))
    		<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
<div style="height: 50px;width: 100%;"></div>

		@endif

		 @if (Session::has('success'))
    		<div class="alert alert-success">{{ Session::get('success') }}</div>
<div style="height: 50px;width: 100%;"></div>

		@endif

        @if (Session::has('message'))
    		<div class="alert alert-info">{{ Session::get('message') }}</div>
<div style="height: 50px;width: 100%;"></div>

		@endif

<h3>Usuários:</h3>
<table style="max-height: 500px;overflow: auto;" width="100%;">
	<tr style="background-color:#FAFAFA;">
		<td>ID</td>
		<td>Nick</td>
		<td>E-mail</td>
	</tr>
	
		@if(count($users) >0)
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->nick}}</td>
			<td>{{$user->email}}</td>
		</tr>
		@endforeach
		@else
		<td colspan="3" rowspan="3">Nenhum usuario cadastrado.</td>
		@endif
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
			    @each('messenger.partials.thread-admin', $threads, 'thread', 'messenger.partials.no-threads-admin')



</table>
<div style="height: 50px;width: 100%;"></div>

<h3>Anuncios de Personagems:</h3>
<table style="max-height: 500px;overflow: auto;" width="100%;">
	<tr style="background-color:#FAFAFA;">
		<td>ID</td>
		<td>Usernick</td>
		<td>Character Name</td>
		<td>Level</td>
		<td>Postado dia</td>
		<td>Ira expirar</td>
	</tr>	
		@if(count($chars) >0)
		@foreach($chars as $char)
		<tr>
			<td>{{$char->id}}</td>
			<td>{{usernick($char->user_id)}}</td>
			<td>{{$char->level}}</td>
			<td>{{$char->name}}</td>
			<td>{{Carbon\Carbon::parse($char->created_at)->diffForHumans()}}</td>
			<td>{{Carbon\Carbon::parse($char->active_days)->diffInDays()}} dias/{{Carbon\Carbon::parse($char->active_days)->diffInHours()}} horas</td>
		</tr>
		@endforeach
		@else
		<td colspan="3" rowspan="3">Nenhum personagem anunciado.</td>
		@endif

</table>
<div style="height: 50px;width: 100%;"></div>

<div class="row">
<div class="col-sm-6" style="padding-right: 5px;">
<div class="form-group">
	<h3>Ativar Anuncio:</h3>
	<form action="/control-panel/admin/ativar-anuncio" method="POST">
		{{csrf_field()}}
		<label for="to"></label>
		<select name="charid" id="to" class="form-control">
			@foreach($charsoff as $c)
			<option value="{{$c->id}}"><b>[{{$c->id}}] [{{$c->level}}] [{{usernick($c->user_id)}}]</b> {{$c->name}}</option>
			@endforeach
		</select>
		
		<label for="pacote">Pacote:</label>
		<select name="pacote" id="pacote" class="form-control">
			<option value="1"><b>[15 dias] Simples</b></option>
			<option value="2"><b>[30 dias] Especial</b></option>
		</select>
	<div class="form-group" style="margin-top:20px;">
	<button type="submit" class="btnred" onclick="return confirm('TEM CERTEZA? Isto não poderá ser desfeito.')">Ativar anuncio</button>
	</div>
	</form>
</div>
</div>
<div class="col-sm-6" style="padding-left: 5px;">
<div class="form-group">
	<h3>Adicionar cargo:</h3>
	<form action="{{route('addPermission')}}" method="POST">
		{{csrf_field()}}
		<div class="form-group">
		<label for="userid">Usuário</label>
		<select name="userid" id="userid" class="form-control">

			@if(count($users) > 0)			
			@foreach($users as $user)
			<?php 
			switch ($user->group_id) {
				case '0':
					$cargo = 'Usuário';
					break;	
					
				case '1':
					$cargo = 'Intermediário';
					break;	

				case '3':	
					$cargo = 'Moderador';
					break;	

				case '4':	
					$cargo = 'Desenvolvedor';
					break;	

				case '5':
					$cargo = 'Administrador';	
					break;
				default:
					$cargo = 'Usuário';
					break;
			}
			?>
			<option value="{{$user->id}}">{{$user->nick}} [{{$cargo}}]</option>
			@endforeach
			@endif
		</select>	
		</div>

		<div class="form-group">		
		<label for="cargo">Cargo</label>
		<select name="cargo" id="cargo" class="form-control">
			<option value="0">Usuário</option>
			<option value="1">Intermediário</option>			
		</select>	
		</div>

	<div class="form-group" style="margin-top:20px;">
	<button type="submit" class="btnred" onclick="return confirm('TEM CERTEZA? Isto não poderá ser desfeito.')">Adicionar Cargo</button>
	</div>
	</form>
</div>
</div>
</div>

<div style="height: 50px;width: 100%;"></div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<form action="{{route('delAnuncioAdmin')}}" method="POST">
				{{csrf_field()}}
			<h1>Deletar Anúncios na lixeira</h1>
	<div class="form-group">
	@if(count($anund) > 0)
		<select name="anuncioid" id="anunc" class="form-control">
			@foreach($anund as $dd)
			<option value="{{$dd->id}}">[{{$dd->id}}] [by: {{usernick($dd->user_id)}} ] [Lvl: {{$dd->level}}] {{$dd->name}}</option>
			@endforeach
		</select>	
	@else
	No momento nenhum anúncio esta na lixeira.
	@endif

		</div>
		<div class="form-group">
			<button type="submit" class="btnred" onclick="return confirm('TEM CERTEZA? Isto não poderá ser desfeito.')">Deletar</button>
		</div>
		</form>
	</div>

			

		</div>
		<div class="col-sm-6">
			@if(auth::user()->group_id > 4)
			<div class="form-group">
				<form action="{{route('delAnuncioAdmin')}}" method="POST">
				{{csrf_field()}}
			<h1>Deletar Anúncios (Qualquer)</h1>
	<div class="form-group">
	@if(count($anunall) > 0)
		<select name="anuncioid" id="anunc" class="form-control">
			@foreach($anunall as $dall)
			<option value="{{$dall->id}}">[{{$dall->id}}] [by: {{usernick($dall->user_id)}} ] [Lvl: {{$dall->level}}] {{$dall->name}}</option>
			@endforeach
		</select>	
	@else
	No momento nenhum anúncio esta na lixeira.
	@endif

		</div>
		<div class="form-group">
			<button type="submit" class="btnred" onclick="return confirm('TEM CERTEZA? Isto não poderá ser desfeito.')">Deletar</button>
		</div>
	</form>
	</div>
	@endif
			
		</div>
	</div>
</div>

@endsection