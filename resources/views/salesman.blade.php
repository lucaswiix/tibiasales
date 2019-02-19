@extends('layouts.default')
@section('title', $nick)
@section('navbar')
<nav class="navbar">
            @include('components/navbar_1')
</nav>
@endsection

@section('main_content')
<div class="allanunc col-md-12">
    <div class="boxing container">
        <div class="novo" align="center">
            <h1>{{$nick}}</h1>
            <small>Reputação: {{$rep}} | Anúncios: <?= count($ads); ?></small>
        </div>
        <hr>

        
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-md-2"></div>

        <div class="feed infinite-scroll col-md-8">
            
            @if(count($ads) > 0)
            @foreach($ads as $ad)
           <div class="character-list">
            <div class="character-infos">
              <div class="img" style="background-image: url('/img/artwork.png');">
              </div>
              <div class="body-char">
                                 <h4 class="header">[{{$ad->vocation}}] Level {{$ad->level}} - {{$ad->world_type}}</h4>
                <div style="color:#666;font-size:0.9em;margin-r">
                  <ul>
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
                <small>Preço</small>
                <span class="value">R$ {{$ad->price}}</span>
                {{-- <small>U$ 450</small> --}}<br>
                
                <div class="next-button">
                  <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btnred">Eu quero!</button>
                </div>
                
                <div class="footer">
                  <small>Anunciado por</small>
                  <span><a href="/user/{!! usernick($ad->user_id) !!}" style="color:#fff;">{!! usernick($ad->user_id) !!}</a></span>
                </div>
              </div>
                        </div>
                    </div>

            @endforeach
            @else
            <div class="col-sm-12" style="margin-top:4em;text-align: center;display: block;">Este vendedor não possui nenhum anúncio ativo.</div>
            @endif

            

        </div>     
        <div class="col-md-2"></div> 
    </div>  
</div>
@endsection