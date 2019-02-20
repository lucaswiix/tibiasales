@extends('layouts.default')
@section('title', 'Anunciar')
@section('navbar')
<nav class="navbar">
	@include('components/navbar_1')
</nav>
@endsection
@section('background-pg', 'background-color:#e9eaee !important;background-image:none;')

@section('main_content')
<div class="allanunc" >
	<div class="container" style="text-align: center;">
		<div class="boxing-all" style="display: inline-block;">
			@if(App::isLocale('es'))
			<div class="back-page">
				<a href="/"><i class="fas fa-home"></i> Home</a>
				<i class="fas fa-angle-right"></i>
				<a href="/">Panel de control</a>
				<i class="fas fa-angle-right"></i>
				Activar anuncio
			</div>
			@else			
			<div class="back-page">
				<a href="/"><i class="fas fa-home"></i> Inicio</a>
				<i class="fas fa-angle-right"></i>
				<a href="/">Painel de Controle</a>
				<i class="fas fa-angle-right"></i>
				Ativar anúncio
			</div>
			@endif

			<div class="donate-box" align="center" style="max-width:750px;position: relative;">
				@if (Session::has('error'))
				<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
				@endif
				@if(isset($chars) && count($chars) > 0)
				@foreach($chars as $char)
				@if(App::isLocale('es'))
				<div class="donate-box-head" >
					<h3>¡Activar el anuncio!</h3>
					<small>Este anuncio ha sido enviado {{Carbon\Carbon::parse($char->created_at)->diffForHumans()}}.</small>
				</div>
				<div class="buttons text-left">
					<div class="feed">
						<div class="character-list" style="margin:20px 0px 20px 0px;">
							<div class="character-infos" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);
								-moz-box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);
								box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);">
								
														@if($char->sex == 'male')

								@if($char->mage_hat)

									<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>

								@else

									@if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif
									
								@endif

							@else 
							{{-- Famele --}}
								@if($char->mage_hat)
								<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
								@else

									@if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif
								
									@if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

								@endif

							@endif

								<div class="body-char">
									<h4 class="header">[{{$char->vocation}}] Level {{$char->level}} - {{$char->world_type}}</h4>
									<div style="color:#666;font-size:0.9em;">
										<ul>
											@if($char->hide_name == 1)
											<li class="char_name"><img src="/img/char-icon.png">{{$char->name}}</li>
											@endif
											@if($char->hide_world == 1)
											<li class="world"><i class="fas fa-globe-americas"></i> {{$char->world}}</li>
											@endif
											@if($char->mage_hat == 1)
											<li class="magehat" style="color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>
											@endif
											@if($char->neon_sparkid_mount == 1)
											<li class="neonsparkid" style="color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>
											@endif
											@if($char->elementalist_addon_2 == 1)
											<li class="elementalist2"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>
											@endif
											<li><i class="fas fa-exchange-alt"></i> {{$char->transfer}}</li>
											<?php
											switch ($char->vocation) {
											case 'Royal Paladin':
											$skill = 'Distance: '.$char->distance_fight;
											break;
											case 'Paladin':
											$skill = 'Distance: '.$char->distance_fight;
											break;
											case 'Elite Knight':
											$rankSkill = [
											'Sword' => $char->sword_fight,
											'Axe' => $char->axe_fight,
											'Club' => $char->club_fight
											];
											$maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
											$key = array_search($maxSkill, $rankSkill);
											$skill = $key.'&nbsp;'.$maxSkill;
											break;
											case 'Knight':
											$rankSkill = [
											'Sword' => $char->sword_fight,
											'Axe' => $char->axe_fight,
											'Club' => $char->club_fight
											];
											$maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
											$key = array_search($maxSkill, $rankSkill);
											$skill = $key.'&nbsp;'.$maxSkill;
											break;
											default:
											$skill = 'Magic Level: '.$char->magiclevel;
											break;
											}
											?>
											<li> <i class="fas fa-bolt"></i> {{$skill}}</li>
										</ul>
									</div>
								</div>
								<div class="price">
									<small>@lang('home.price')</small>
									<span class="value">{{$char->moeda}} {{$char->price}}</span>
									{{-- <small>U$ 450</small> --}}<br>
									
									<div class="next-button">
										<button type="button" class="btnred">@lang('home.iwant')</button>
									</div>
									
									<div class="footer">
										<small>Anunciado por</small>
										<span>{!! usernick($char->user_id) !!}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
					<h4>1. Paquetes</h4>
					<form action="{{route('confirmDonate')}}" method="POST">
						{{csrf_field()}}
					<div class="offers-donate">
						<div class="form-group">
							<label for="50">
								<div class="card">
									<div class="box">
										<div class="img">
											<img src="{{asset('img/serviceid_1.png')}}">
										</div>
										<h2>Sencillo<br><span>50 Tibia Coins</span></h2>
										<p>Deja tu anuncio disponible por <b>15</b> días.</p>
										<span style="margin-top:20px;">
											<ul style="color:#000;">
												<input type="radio" class="pacotex" name="pacote" id="50" value="1">
												<label for="50"><b>Elegir</b></label>
											</ul>
										</span>
									</div>
								</div></label>
								<label for="100">
									<div class="card">
										<div class="box">
											<div class="img">
												<img src="{{asset('img/serviceid_4.png')}}">
											</div>
											<h2>Especial<br><span style="background-color:#C87A00;">100 Tibia Coins</span></h2>
											<p> Deja tu anuncio disponible por <b>30</b> días em <font color="#C87A00"><b>representado</b></font>, 
											aumentando la posibilidad de venta.</p>
											<span style="margin-top:20px;">
												<ul style="color:#000;">
													<input type="radio" class="pacote100 pacotex" name="pacote" id="100" value="2">
													<label for="100"><b>Elegir</b></label>
												</ul>
											</span>
										</div>
									</div></label>
								</div>
							</div>
								
								<div class="next" style="margin-top:50px;">
									<h3>2. Haga la transferencia:</h3>
									<small>									
									Al donar para el <font color="#155AA8">TibiaSales</font> usted nos está ayudando a crecer, no tenemos ningún fin lucrativo, todas las donaciones se utilizan para el beneficio del sitio.</small>
									<br><br>
									<p>Haga la transferencia partiendo del personaje anunciado.</p><br>
									<h4>De: <font color="red"><b>{{$char->name}}</b></font></h4>
									<h4>A: <font color="red"><b><a style="color:red;" href="https://www.tibia.com/community/?subtopic=characters&name={{Config::get('app.receive_coins_url')}}" target="_blank">{{Config::get('app.receive_coins_name')}}</a></b></font></h4>
									<h4>Precio: <font color="red"><b><span id="adprice">50</span> Tibia Coins</b></font></h4>
									
									<div style="margin-top:50px;">
										<h3>3. Confirme la transferencia</h3>
										<p> ¡Agradecemos de corazón por su donación! <br><b>En hasta 6 horas su anuncio ya estará activo.</b> Gracias <3 </p><br>
											<div class="form-group">
												<label for="confirm-coins" style="font-weight: 700;color:red;border:solid 1px #000;padding:20px;">
									<input type="checkbox" id="confirm-coins" value="1" name="confirm" required> Yo confirmo que ya he transferido las monedas.</label>
									</div>
									</div>


									<div class="footer" style="right:0;bottom:0;margin-bottom:20px;margin-top:3em;float:right;margin-right:20px;">
										<span><b>¡Hey, confirme aquí!</b></span><br>										
										<input type="hidden" value="{{$char->id}}" name="charid">
										<button type="submit" class="btnred float-right" id="confirm"><i class="fas fa-check" style="color:#fff;"></i>  Confirmar</button>									
								</div>
								</form>
							</div>
						</div>
						@else
				<div class="donate-box-head" >
					<h3>Ative o anuncio!</h3>
					<small>Este anuncio foi postado {{Carbon\Carbon::parse($char->created_at)->diffForHumans()}}.</small>
				</div>
				<div class="buttons text-left">
					<div class="feed">
						<div class="character-list" style="margin:20px 0px 20px 0px;">
							<div class="character-infos" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);
								-moz-box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);
								box-shadow: 0px 0px 5px 0px rgba(231,166,26,1);">
								
														@if($char->sex == 'male')

								@if($char->mage_hat)

									<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>

								@else

									@if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif
									
								@endif

							@else 
							{{-- Famele --}}
								@if($char->mage_hat)
								<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
								@else

									@if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

									@if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif
								
									@if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
										<div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
									@endif

								@endif

							@endif

								<div class="body-char">
									<h4 class="header">[{{$char->vocation}}] Level {{$char->level}} - {{$char->world_type}}</h4>
									<div style="color:#666;font-size:0.9em;">
										<ul>
											@if($char->hide_name == 1)
											<li class="char_name"><img src="/img/char-icon.png">{{$char->name}}</li>
											@endif
											@if($char->hide_world == 1)
											<li class="world"><i class="fas fa-globe-americas"></i> {{$char->world}}</li>
											@endif
											@if($char->mage_hat == 1)
											<li class="magehat" style="color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>
											@endif
											@if($char->neon_sparkid_mount == 1)
											<li class="neonsparkid" style="color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>
											@endif
											@if($char->elementalist_addon_2 == 1)
											<li class="elementalist2"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>
											@endif
											<li><i class="fas fa-exchange-alt"></i> {{$char->transfer}}</li>
											<?php
											switch ($char->vocation) {
											case 'Royal Paladin':
											$skill = 'Distance: '.$char->distance_fight;
											break;
											case 'Paladin':
											$skill = 'Distance: '.$char->distance_fight;
											break;
											case 'Elite Knight':
											$rankSkill = [
											'Sword' => $char->sword_fight,
											'Axe' => $char->axe_fight,
											'Club' => $char->club_fight
											];
											$maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
											$key = array_search($maxSkill, $rankSkill);
											$skill = $key.'&nbsp;'.$maxSkill;
											break;
											case 'Knight':
											$rankSkill = [
											'Sword' => $char->sword_fight,
											'Axe' => $char->axe_fight,
											'Club' => $char->club_fight
											];
											$maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
											$key = array_search($maxSkill, $rankSkill);
											$skill = $key.'&nbsp;'.$maxSkill;
											break;
											default:
											$skill = 'Magic Level: '.$char->magiclevel;
											break;
											}
											?>
											<li> <i class="fas fa-bolt"></i> {{$skill}}</li>
										</ul>
									</div>
								</div>
								<div class="price">
									<small>Preço</small>
									<span class="value">{{$char->moeda}} {{$char->price}}</span>
									{{-- <small>U$ 450</small> --}}<br>
									
									<div class="next-button">
										<button type="button" class="btnred">Eu quero!</button>
									</div>
									
									<div class="footer">
										<small>Anunciado por</small>
										<span>{!! usernick($char->user_id) !!}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
					<h4>1. Pacotes</h4>
					<form action="{{route('confirmDonate')}}" method="POST">
						{{csrf_field()}}
					<div class="offers-donate">
						<div class="form-group">
							<label for="50">
								<div class="card">
									<div class="box">
										<div class="img">
											<img src="{{asset('img/serviceid_1.png')}}">
										</div>
										<h2>Simples<br><span>50 Tibia Coins</span></h2>
										<p> Deixa o seu anúncio disponível por <b>15</b> dias.</p>
										<span style="margin-top:20px;">
											<ul style="color:#000;">
												<input type="radio" class="pacotex" name="pacote" id="50" value="1">
												<label for="50"><b>Escolher</b></label>
											</ul>
										</span>
									</div>
								</div></label>
								<label for="100">
									<div class="card">
										<div class="box">
											<div class="img">
												<img src="{{asset('img/serviceid_4.png')}}">
											</div>
											<h2>Especial<br><span style="background-color:#C87A00;">100 Tibia Coins</span></h2>
											<p> Deixa o seu anúncio disponível por <b>30</b> dias em <font color="#C87A00"><b>destaque</b></font>, aumentando a chance de venda.</p>
											<span style="margin-top:20px;">
												<ul style="color:#000;">
													<input type="radio" class="pacote100 pacotex" name="pacote" id="100" value="2">
													<label for="100"><b>Escolher</b></label>
												</ul>
											</span>
										</div>
									</div></label>
								</div>
							</div>
								
								<div class="next" style="margin-top:50px;">
									<h3>2. Faça a transferencia:</h3>
									<small>
									Ao doar para o <font color="#155AA8">TibiaSales</font> você esta nos ajudando a crescer, não temos nenhum fim lucrativo, todas doações são usadas para o beneficio do site.</small>
									<br><br>
									<p>Faça a transferencia partindo do personagem anunciado.</p><br>
									<h4>De: <font color="red"><b>{{$char->name}}</b></font></h4>
									<h4>Para: <font color="red"><b><a style="color:red;" href="https://www.tibia.com/community/?subtopic=characters&name={{Config::get('app.receive_coins_url')}}" target="_blank">{{Config::get('app.receive_coins_name')}}</a></b></font></h4>
									<h4>Valor: <font color="red"><b><span id="adprice">50</span> Tibia Coins</b></font></h4>
									
									<div style="margin-top:50px;">
										<h3>3. Confirme a transferencia</h3>
										<p>Agradeçemos de coração por sua doação! <br><b>Em até 6 horas o seu anuncio já estará ativo.</b> Obrigado <3 </p><br>
											<div class="form-group">
												<label for="confirm-coins" style="font-weight: 700;color:red;border:solid 1px #000;padding:20px;">
									<input type="checkbox" id="confirm-coins" value="1" name="confirm" required> Eu confirmo que já transferi os coins.</label>
									</div>
									</div>


									<div class="footer" style="right:0;bottom:0;margin-bottom:20px;margin-top:3em;float:right;margin-right:20px;">
										<span><b>Hey, confirme aqui!</b></span><br>										
										<input type="hidden" value="{{$char->id}}" name="charid">
										<button type="submit" class="btnred float-right" id="confirm"><i class="fas fa-check" style="color:#fff;"></i>  Confirmar</button>									
								</div>
								</form>
							</div>
						</div>
						@endif
						@endforeach
						@else
						<div class="donate-box-head" >
							<h3>Ops!</h3>
							<small>Este anuncio não esta disponivel.</small>
						</div>
						<div class="buttons text-center">
							<img src="{{asset('img/error_404.png')}}" alt="">
						</div>
						<div class="col-sm-12 text-center" style="margin-top:20px;">
							<a href="/control-panel">
							<button class="btnblue col-sm-6" type="button">Voltar</button></a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endsection

		@section('footer')
		<div class="" style="height:100px;margin-top:4em;bottom:0;text-align: center;">
			<div class="container">
				<small>Toda doacao realizada é usada diretamente no servidor TibiaSales, impulsinando a qualidade. <br>Como gratificação te damos certas regalias dentro do nosso aplicativo.<br> Agradecemos sua confiança.</small>
			</div>
		</div>
		@endsection
	@section('js')
		<script>
			$('.pacotex').click(function(){
				var valor = $( this ).val();
				if(valor == 1)
				{
					valor = 50;
				}else if (valor == 2) {
					valor = 100;
					
				}else{
					valor = 50;
				}

				$('#adprice').html(valor);

			})
		</script>

	@endsection
