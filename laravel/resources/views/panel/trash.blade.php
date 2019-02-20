@extends('layouts.default')
@section("title", '')
@section('navbar')
<nav class="navbar">
	@include('components/navbar_1-admin')
	@include('components/navbar_2-admin')
</nav>
@endsection
@section('background-pg', 'background-color:#e9eaee !important;background-image:none;')

@section('main_content')
<div class="allanunc col-md-12">
	<div class="boxing container">
		<div class="novo">

		@if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors as $erro)
            <strong>{{ $erro }}</strong><br>
            @endforeach
        </div>
        @endif
		
		@if (Session::has('error'))
    		<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
		@endif

		 @if (Session::has('success'))
    		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

        @if (Session::has('message'))
    		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

			<div class="row">
			<div class="col-sm-6 text-left">
				<a href="/control-panel">
			<button type="button" class="btnred">
			<i class="fas fa-backward"></i> Voltar
			</button>
				</a>
			</div>

			<div class="col-sm-6 text-right" style="text-align: right;">
				
			</div>
			</div>
			
			
			@if(count($ads) > 0)
			<div class="found text-muted small-txt" align="center">
			Você possui <?= count($ads) ?>
				@if(count($ads) > 1)
				anúncios na lixeira.
				@else
				anúncio na lixeira.
				@endif			 
			</div>			
			@endif

		</div>
		<div class="float-right">
		{{ $ads->links( "pagination::simple-bootstrap-4") }}
		</div>
		<div class="clearfix"></div>

		<div class="row" style="margin-bottom: 20px;margin-top: 20px;">
			
			@if(count($ads) > 0)
			@foreach($ads as $ad)
			
			<div class="col-md-6" style="margin-bottom: 20px;">

				<small>Este anúncio será deletado em {{Carbon\Carbon::parse($ad->delete)->diffInDays()}} dia(s).</small>

				<div class="feed">
					<div class="character-list" style="padding-bottom:0;-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
						-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
						box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
						<div class="character-infos" style="overflow-x:auto;box-shadow:none;">
							@if($ad->sex == 'male')

                @if($ad->mage_hat)

                  <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>

                @else

                  @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                  @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                  @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                  @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif
                  
                @endif

              @else 
              {{-- Famele --}}
                @if($ad->mage_hat)
                <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                @else

                  @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                  @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                  @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif
                
                  @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                    <div class="img" style="background-image: url('http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10');background-position: -50px -30px;"></div>
                  @endif

                @endif

              @endif
							<div class="body-char">
								<h4 class="header">[{{$ad->vocation}}] Level {{$ad->level}} - {{$ad->world_type}}</h4>
								<div class="text">
									<ul class="ad-char-details">
										 @if($ad->hide_name == 1)
                    <li class="char_name"><img src="/img/char-icon.png">{{$ad->name}}</li>
                    @endif
                    @if($ad->hide_world == 1)
                    <li class="world"><i class="fas fa-globe-americas"></i> {{$ad->world}}</li>
                    @endif
                    @if($ad->mage_hat == 1)
                    <li class="magehat" style="color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>
                    @endif
                    @if($ad->neon_sparkid_mount == 1)
                    <li class="neonsparkid" style="color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>
                    @endif
                    @if($ad->elementalist_addon_2 == 1)
                    <li class="elementalist2"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>
                    @endif
                    <li><i class="fas fa-exchange-alt"></i> {{$ad->transfer}}</li>
                    <?php
                    switch ($ad->vocation) {
                    case 'Royal Paladin':
                    $skill = 'Distance: '.$ad->distance_fight;
                    break;
                    case 'Paladin':
                    $skill = 'Distance: '.$ad->distance_fight;
                    break;
                    case 'Elite Knight':
                    $rankSkill = [
                    'Sword' => $ad->sword_fight,
                    'Axe' => $ad->axe_fight,
                    'Club' => $ad->club_fight
                    ];
                    $maxSkill = max(array($ad->sword_fight, $ad->axe_fight, $ad->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $skill = $key.'&nbsp;'.$maxSkill;
                    break;
                    case 'Knight':
                    $rankSkill = [
                    'Sword' => $ad->sword_fight,
                    'Axe' => $ad->axe_fight,
                    'Club' => $ad->club_fight
                    ];
                    $maxSkill = max(array($ad->sword_fight, $ad->axe_fight, $ad->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $skill = $key.'&nbsp;'.$maxSkill;
                    break;
                    default:
                    $skill = 'Magic Level: '.$ad->magiclevel;
                    break;
                    }
                    ?>
                    <li> <i class="fas fa-bolt"></i> {{$skill}}</li>
									</ul>
								</div>
							</div>
							<div class="price">
								<br /><br /><br />
								<small>Preço</small>
								<span class="value">R$ {{$ad->price}}</span>
								{{-- <small>U$ 450</small> --}}
							</div>
						</div>
						<div class="admin-anunc">
						
							@if($ad->delete > Carbon\Carbon::now())
							<a href="/characters/restore/{{$ad->id}}" >
							<button type="button" class="btnred" onclick="return confirm('Tem certeza que deseja restaurar isto?');">
							<i class="fas fa-trash-restore"></i> Restaurar </button>
							</a>
              @endif
						</div>
						
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-sm-12" style="margin-top:4em;text-align: center;display: block;">Sua lixeira esta vazia!</div>
			@endif

			
			
		</div>	
		<div class="float-right">
		{{ $ads->links( "pagination::default") }}
		</div>

	</div>	
</div>
@endsection