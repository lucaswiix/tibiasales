@extends('layouts.default')

@section("navbar")
	<nav class="navbar">
		@include('components/navbar_1')
		@include('components/navbar_2')
	</nav>
@endsection

@section("main_content")
<div class="container" style="margin-top:3em;">
        <div class="row">
            <div class="col-12">
                <div class="card"> 
                @if(isset($chars))      
                    @foreach($chars as $char)
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
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
                                    <h6 class="d-block"><a href="javascript:void(0)"><button class="btnblue">Oferecer Proposta</button></a></h6>       
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
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Contato Social</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

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
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    
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

               
                        @endforeach
                    @else
                    <center>
                        <b>Este anuncio não esta ativo 😞</b><br><br>Este anuncio é seu? Ative-o no painel de controle, após fazer o <a href="/login">Login</a>.</center>
                    @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<footer class="footer" style="margin-top:50px;">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Atenção!</h5>
<!--headin5_amrc-->
<p class="mb10">Não nos responsabilizamos pela negociação entre os responsavéis. Apenas ajudamos na divulgação do seu anuncio. Se tiver qualquer duvida não hesite em contactar-nos.</p>
{{-- <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p> --}}
{{-- <p><i class="fa fa-phone"></i>  +91-9999878398  </p> --}}
<p><i class="fa fa fa-envelope"></i> contato@tibiasales.com  </p>


</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Links Rapidos</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="/sell-char">Anunciar Personagem</a></li>
<li><a href="/sell-rares">Anunciar Rares</a></li>
<li><a href="/donate">Doação</a></li>
<li><a href="/special-donate">Doação Especial</a></li>
<li><a href="/login">Fazer Login</a></li>
<li><a href="/register">Criar Conta</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Ajuda</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="/sell-char">Como anunciar</a></li>
<li><a href="/sell-rares">Porque doar?</a></li>
<li><a href="/donate">O que é doação especial?</a></li>
<li><a href="/special-donate">Quem são vocês?</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Melhores</h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
    <li><p>Não encontramos nenhum =(</p></li>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="/">Personagens</a></li>
<li><a href="/rares">Rares</a></li>
<li><a href="/tibiacoins">Tibia Coins</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2019 | Designed With by <a href="/">TibiaSales</a></p>

{{-- <ul class="social_footer_ul">
<li><a href="http://kalarikendramdelhi.com"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="http://kalarikendramdelhi.com"><i class="fab fa-twitter"></i></a></li>
<li><a href="http://kalarikendramdelhi.com"><i class="fab fa-linkedin"></i></a></li>
<li><a href="http://kalarikendramdelhi.com"><i class="fab fa-instagram"></i></a></li>
</ul> --}}
<!--social_footer_ul ends here-->
</div>

</footer>


@endsection