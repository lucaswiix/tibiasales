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
                    @if($ad->hide_name == 0)
                    <li class="char_name"><img src="/img/char-icon.png">{{$ad->name}}</li>
                    @endif
                    @if($ad->hide_world == 0)
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
                <small>@lang('home.price')</small>
                <span class="value">{{$ad->moeda}} {{$ad->price}}</span>
                {{-- <small>U$ 450</small> --}}<br>
                
                <div class="next-button">
                  <button type="button" data-toggle="modal" data-target="#modalwant-{{$ad->id}}" class="btnred">@lang('home.iwant')</button>
                </div>
                
                <div class="footer">
                  <small>Anunciado por</small>
                  <span><a href="/user/{!! usernick($ad->user_id) !!}" style="color:#fff;">{!! usernick($ad->user_id) !!}</a></span>
                </div>
              </div>
                        </div>
                    </div>

                     {{-- Modal --}}
                       <div class="modal fade" id="modalwant-{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            @if($ad->sex == 'male')
                @if($ad->mage_hat)
                 <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />  

                @else

                  @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif

                  @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif
                  
                @endif

              @else 
              {{-- Famele --}}
                @if($ad->mage_hat)
                <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                @else

                  @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                  @endif

                  @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                       @endif

                  @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                  <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                   @endif
                
                  @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                   <img src="http://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                  @endif

                @endif

              @endif
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="/char/{{$ad->url}}">[{{$ad->vocation}}] Level {{$ad->level}} - {{$ad->world_type}}</a></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)">Link:</a> <input type="text" value="tibiasales.com/char/{{$ad->url}}" class="form-control" disabled></h6>
                                    <div class="row" style="margin:0;padding:0;">
                                      @if(auth::check())

                                    <h6 class="d-block" style="margin-right:10px;">
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$ad->id}}" name="charid">
                                        <input type="hidden" value="{{$ad->user_id}}" name="userid">
                                        <button type="submit" class="btnred">Enviar Mensagem</button>
                                      </form>
                                      </a>
                                    </h6>                                    
                                    <h6 class="d-block">

                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="proposal">
                                        <input type="hidden" value="{{$ad->id}}" name="charid">
                                        <input type="hidden" value="{{$ad->user_id}}" name="userid">
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
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo-{{$ad->id}}" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices-{{$ad->id}}" role="tab" aria-controls="connectedServices" aria-selected="false">Contato Social</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo-{{$ad->id}}" role="tabpanel" aria-labelledby="basicInfo-tab">

                                      @if($ad->mage_hat == 0 && $ad->elementalist_addon_2  == 0 && $ad->neon_sparkid_mount == 0)
                                        
                                      @else
                                        @if($ad->mage_hat == 1)
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

                                        @if($ad->elementalist_addon_2 == 1)
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

                                        @if($ad->neon_sparkid_mount == 1)
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

                                        
                                        
                                        @if($ad->hide_name == 0)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nome</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->name}}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif
                                        
                                        @if($ad->hide_world == 0)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->world}}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                         <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World Type</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->world_type}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Level</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->level}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Vocation</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->vocation}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">World Transfer</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->transfer}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        <?php
                    switch ($ad->vocation) {
                    case 'Royal Paladin':
                    $key = 'Distance Fighting';
                    $skill = $ad->distance_fight;
                    break;
                    case 'Paladin':
                    $key = 'Distance Fighting';

                    $skill = $ad->distance_fight;
                    break;
                    case 'Elite Knight':
                    $rankSkill = [
                    'Sword Fighting' => $ad->sword_fight,
                    'Axe Fighting' => $ad->axe_fight,
                    'Club Fighting' => $ad->club_fight
                    ];
                    $maxSkill = max(array($ad->sword_fight, $ad->axe_fight, $ad->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $key = $key;
                    $skill = $maxSkill;
                    break;
                    case 'Knight':
                    $rankSkill = [
                    'Sword Fighting' => $ad->sword_fight,
                    'Axe Fighting' => $ad->axe_fight,
                    'Club Fighting' => $ad->club_fight
                    ];
                    $maxSkill = max(array($ad->sword_fight, $ad->axe_fight, $ad->club_fight));
                    $key = array_search($maxSkill, $rankSkill);
                    $key = $key;
                    $skill = $maxSkill;
                    break;
                    default:
                    $key = 'Magic Level';
                    $skill = $ad->magiclevel;
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
                                                {{$ad->shielding}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">@lang('home.price')</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->moeda}} {{$ad->price}}
                                            </div>
                                        </div>
                                        <hr />

                                        @if($ad->accept_tc == 1)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Tibia Coins</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$ad->price_tc}}
                                            </div>
                                        </div>
                                        <hr />
                                      @endif

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices-{{$ad->id}}" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    
                                    @if(whatsapp($ad->user_id) != NULL || facebook($ad->user_id) != NULL)

                                      @if(whatsapp($ad->user_id) != NULL)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Whatsapp</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {!! whatsapp($ad->user_id) !!}
                                            </div>
                                        </div>
                                        <hr />
                                        @endif

                                        @if(facebook($ad->user_id) != NULL)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Facebook</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                               {!! facebook($ad->user_id) !!}
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


            @endforeach
            @else
            <div class="col-sm-12" style="margin-top:4em;text-align: center;display: block;">Este vendedor não possui nenhum anúncio ativo.</div>
            @endif

            

        </div>     
        <div class="col-md-2"></div> 
    </div>  
</div>
@endsection