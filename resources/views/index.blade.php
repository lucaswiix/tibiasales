@extends('layouts.default')
@section('title', 'TibiaSales')
@section('navbar')
<nav class="navbar">
  @include('components/navbar_1')
  @include('components/navbar_2')
</nav>
@endsection
@section('main_content')
<div class="container">
  <div class="first-att">
    
  </div>
  <div class="box-center">
    <div class="row">
      <div class="sidebar col-xl-3 col-md-4 col-sm-12">
        <div class="search-box">
          <div class="header">
            Compre seu Personagem <a href="/" style="color:#fff;"><i class="fas fa-broom"></i></a>
          </div>
          <div class="body">
            <form action="{{route('searchchar')}}" method="get">
              {{csrf_field()}}
              <div class="form-group">
                <span class="header-input">Mundo</span>
                <select name="world" id="loadworlds" class="form-control">
                  <option value="all">Todos</option>
                  @for($i=0; $i < $num; $i++)
                  <option value="{{$w[$i]['name']}}">{{$w[$i]['name']}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group">
                <span class="header-input">Ordenar:</span>
                <select name="orderby" id="orderby" class="form-control">
                  @if(old('orderby'))
                  <option value="{{ old('orderby') }}" selected disabled>{{ old('orderby') }}</option>
                  @endif
                  
                  <option value="Mais Recente">Mais Recente</option> 
                  <option value="Menor Preço">Menor Preço</option>
                  <option value="Maior Level">Maior Level</option>                  
                  <option value="Menor Level">Menor Level</option>                  
                  <option value="Maior Preço">Maior Preço</option>
                  <option value="Mais Antigo">Mais Antigo</option>                  
                </select>
              </div>
              <div class="form-group">
                <span class="header-input">Level:</span>

                <input type="text" name="min_lvl" class="form-control" value="{{ old('min_lvl') ? old('min_lvl') : ''}}" placeholder="Min" >

                <input type="text" name="max_lvl" value="{{ old('max_lvl') }}" class="form-control" placeholder="Max">
              </div>
              <div class="form-group">
                <span class="header-input">Vocação:</span>
                <div class="form-check">
                  <input class="" type="checkbox" name="ek" value="1" id="knight" {{ old('ek') ? 'checked' : ''}}>
                  <label class="form-check-label" for="knight">
                    Knight
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" name="rp" value="1" id="paladin" {{ old('rp') ? 'checked' : ''}}>
                  <label class="form-check-label" for="paladin">
                    Paladin
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" name="ed" value="1" id="druid" {{ old('ed') ? 'checked' : ''}}>
                  <label class="form-check-label" for="druid">
                    Druid
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" name="ms" value="1" id="sorcerer" {{ old('ms') ? 'checked' : ''}}>
                  <label class="form-check-label" for="sorcerer">
                    Sorcerer
                  </label>
                </div>
              </div>
              <div class="form-group">
                <span class="header-input">Modo do PvP</span>
                
                <div class="form-check">
                  <input class="" type="checkbox" value="1" name="npvp" id="nonpvp" {{ old('npvp') ? 'checked' : ''}}>
                  <label class="form-check-label" for="nonpvp">
                    Optional PvP
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" value="1" name="opvp" id="openpvp" {{ old('opvp') ? 'checked' : ''}}>
                  <label class="form-check-label" for="openpvp">
                    Open PvP
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" value="1" name="retroopen" id="retrop"  {{ old('retroopen') ? 'checked' : ''}}>
                  <label class="form-check-label" for="retrop">
                    Retro Open PvP
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" value="1" name="retrohardcore" id="retroh" {{ old('retrohardcore') ? 'checked' : ''}}>
                  <label class="form-check-label" for="retroh">
                    Retro Hardcore PvP
                  </label>
                </div>
                <div class="form-check">
                  <input class="" type="checkbox" value="1" name="hpvp" id="hardcorepvp"  {{ old('hpvp') ? 'checked' : ''}}>
                  <label class="form-check-label" for="hardcorepvp">
                    Hardcore PvP
                  </label>
                </div>
              </div>
              <button type="submit" class="btn-find">Procurar</button>
            </form>
          </div>
          
        </div>
        
        
        <div class="others-search">
          
        </div>
      </div>
      <div class="content-center col-xl-8 col-md-8 col-sm-12">
        <div class="order-by" style="margin-bottom: 20px;">
          <div class="row" style="margin:0;padding:0;">    
          @if(auth::check())      
            <a href="/sellchar">  
              @else
            <a href="/sales"> 
              @endif
             <button type="button" class="btn-outblue" style="margin-left:10px;margin-right:10px;"><i class="far fa-address-card"></i> Anunciar um Personagem</button>
            </a>
             <div class="vertical-divider"></div>
             @if(auth::check())
             <a href="/control-panel/messages/intermediate">
              @else
              <a href="/login">
              @endif
             <button type="button" class="btn-outblue" style="margin-left:10px;margin-right:10px;"><i class="fas fa-shield-alt"></i> Solicitar Intermédio</button>             
             </a>
            
          </div>
        </div>
        <div class="feed infinite-scroll">
          @if(count($chars) > 0)
          @foreach($chars as $char)
          <div class="character-list">
            <div class="character-infos">
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
                <span class="value">R$ {{$char->price}}</span>
                {{-- <small>U$ 450</small> --}}<br>
                
                <div class="next-button">
                  <button type="button" data-toggle="modal" data-target="#modalwant-{{$char->id}}" class="btnred">Eu quero!</button>
                </div>
                
                <div class="footer">
                  <small>Anunciado por</small>
                  <span><a href="/user/{!! usernick($char->user_id) !!}" style="color:#fff;">{!! usernick($char->user_id) !!}</a></span>
                </div>
              </div>
            </div>
          </div>
    
            {{-- Modal --}}
                       <div class="modal fade" id="modalwant-{{$char->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content " style="border-radius: 0;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Character</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border:none;">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
            @if($char->sex == 'male')
                @if($char->mage_hat)
                 <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />  

                @else

                  @if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif

                  @if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif
                  
                @endif

              @else 
              {{-- Famele --}}
                @if($char->mage_hat)
                <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                @else

                  @if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                       @endif

                  @if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                   @endif
                
                  @if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
                   <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif

                @endif

              @endif
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="/char/{{$char->url}}">[{{$char->vocation}}] Level {{$char->level}} - {{$char->world_type}}</a></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)">Link:</a> <input type="text" value="tibiasales.com/char/{{$char->url}}" class="form-control" disabled></h6>
                                    <div class="row" style="margin:0;padding:0;">
                                      @if(auth::check())

                                    <h6 class="d-block" style="margin-right:10px;">
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$char->name}}" name="charnick">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnred">Enviar Mensagem</button>
                                      </form>
                                      </a>
                                    </h6>                                    
                                    <h6 class="d-block">

                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="proposal">
                                        <input type="hidden" value="{{$char->name}}" name="charnick">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnblue">Oferecer Proposta</button>
                                      </form>

                                    </h6>       
                                    </div>              
                                    @else

                                    <h6 class="d-block" style="margin-right:10px;">

                                      <button data-toggle="tooltip" data-placement="bottom" title="Você não esta logado." class="btnred disabled">Enviar Mensagem</button>

                                    </h6>                                    
                                    <h6 class="d-block">

                                      <button class="btnblue" data-toggle="tooltip" data-placement="bottom" title="Você não esta logado.">Oferecer Proposta</button>
                                    </h6>       
                                    </div>    
                                    @endif               
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo-{{$char->id}}" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices-{{$char->id}}" role="tab" aria-controls="connectedServices" aria-selected="false">Contato Social</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo-{{$char->id}}" role="tabpanel" aria-labelledby="basicInfo-tab">

                                      @if($char->mage_hat == 0 && $char->elementalist_addon_2  == 0 && $char->neon_sparkid_mount == 0)
                                        
                                      @else
                                        @if($char->mage_hat == 1)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Mage Hat</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Mage Addon 2 <img src="{{asset('img/mage_hat_outfit.gif')}}" width="32" height="32">
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                        @if($char->elementalist_addon_2 == 1)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Elementalist</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Elementalist Addon 2 <img src="{{asset('img/elementalist_addon.gif')}}" width="32" height="32">
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                        @if($char->neon_sparkid_mount == 1)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Mount</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Neon Sparkid Mount <img src="{{asset('img/loading.gif')}}" width="32" height="32">
                                            </div>
                                        </div>
                                        <hr />
                                        @endif
                                      @endif

                                        
                                        
                                        @if($char->hide_name == 0)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nome</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->name}}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif
                                        
                                        @if($char->hide_world == 0)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->world}}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                         <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World Type</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->world_type}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Level</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->level}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Vocation</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->vocation}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World Transfer</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->transfer}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        <?php
                    switch ($char->vocation) {
                    case 'Royal Paladin':
                    $key = 'Distance Fighting';
                    $skill = $char->distance_fight;
                    break;
                    case 'Paladin':
                    $key = 'Distance Fighting';

                    $skill = $char->distance_fight;
                    break;
                    case 'Elite Knight':
                    $rankSkill = [
                    'Sword Fighting' => $char->sword_fight,
                    'Axe Fighting' => $char->axe_fight,
                    'Club Fighting' => $char->club_fight
                    ];
                    $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $key = $key;
                    $skill = $maxSkill;
                    break;
                    case 'Knight':
                    $rankSkill = [
                    'Sword Fighting' => $char->sword_fight,
                    'Axe Fighting' => $char->axe_fight,
                    'Club Fighting' => $char->club_fight
                    ];
                    $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $key = $key;
                    $skill = $maxSkill;
                    break;
                    default:
                    $key = 'Magic Level';
                    $skill = $char->magiclevel;
                    break;
                    }
                    ?>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">{{$key}}</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$skill}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Shielding</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$char->shielding}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Preço</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                R$ {{$char->price}}
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices-{{$char->id}}" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    
                                    @if(whatsapp($char->user_id) != NULL && facebook($char->user_id) != NULL)

                                      @if(whatsapp($char->user_id) != NULL)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Whatsapp</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {!! whatsapp($char->user_id) !!}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                        @if(facebook($char->user_id) != NULL)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Facebook</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                               {!! facebook($char->user_id) !!}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                        @else
                                        Este usuário não tem nenhuma rede social cadastrada.
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
        
      </div>
    </div>
  </div>
</div>
{{-- modal fim --}}
  
          @endforeach
          {{ $chars->links() }}
          @else
        <center><br><Br><font color="#444">Não encontramos nenhum anuncio 😞</span></center>
        @endif
      </div>
    </div>
  </div>
</div>

</div>
@endsection
@section('js')
<script type="text/javascript">
      $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<center><img class="center-block" src="/img/loading.gif" alt="Loading..." /></center>',
            padding: 10,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endsection