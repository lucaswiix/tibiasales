@extends('layouts.default')
@section("navbar")
<nav class="navbar">
    @include('components/navbar_1')
    @include('components/navbar_2')
</nav>
@endsection
@section('style')
{{-- <link rel="stylesheet" href="{{asset('css/summoner.css')}}"> --}}
<link href="//opgg-static.akamaized.net/css3/summoner.css?t=1550560314" rel="stylesheet" type="text/css">
<link href="//opgg-static.akamaized.net/css3/common.css?t=1550560314" rel="stylesheet" type="text/css">
{{-- <link href="//opgg-static.akamaized.net/css3/sprite.css?t=1550560314" rel="stylesheet" type="text/css"> --}}
<link href="//opgg-static.akamaized.net/css3/new.css?t=1550560314" rel="stylesheet" type="text/css">
@endsection
@section("main_content")

@if(isset($chars))
@foreach($chars as $char)
<?php
                            if($char->vocation == 'Elite Knight' || $char->vocation == 'Knight'){
                            $l = 15;
                            $m = 5;
                            $lx = 185;
                            $mx = 50;
                            }elseif($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin'){
                            $l = 10;
                            $m = 15;
                            $lx = 185;
                            $mx = 90;
                            }else{
                            $l = 5;
                            $m = 30;
                            $lx = 145;
                            $mx = 90;
                            }
                            $life = ($char->level - 8) * $l + $lx;
                            $mana = ($char->level - 8) * $m + $mx;
                            ?>
<div class="l-container col-sm-12" style="max-width: 100% !important;overflow: auto;">
    <div class="SummonerLayoutWrap">
        <div class="SummonerLayout row tabWrap _recognized">
            
            <div class="Header container row" style="width: 100% !important;">
                <div class="PastRank">
                    {{-- <ul class="PastRankList">
                        <li class="Item tip tpd-delegation-uid-1" title="">
                        <b>S6</b> Silver</li>
                        <li class="Item tip tpd-delegation-uid-1" title="">
                        <b>S7</b> Gold</li>
                        <li class="Item tip" title="Gold 5 58LP">
                        <b>S8</b> Gold</li>
                    </ul> --}}
                </div>
                
                <div class="Face " style="padding:0 !important;">
                    <div class="ProfileIcon">
                        
                        <div class="ProfileImage" style="background-color:#17172E;border-radius: 4px;">
                            
                            @if($char->vocation == 'Elder Druid' || $char->vocation == 'Druid')
                            <img src="{{asset('img/class_icon_druid.png')}}" alt="{{$char->vocation}}" style="width: 100%;height: auto;">
                            @elseif($char->vocation == 'Master Sorcerer' || $char->vocation == 'Sorcerer')
                            <img src="{{asset('img/class_icon_Sorcerer.png')}}" alt="{{$char->vocation}}" style="width: 100%;height: auto;">
                            @elseif($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin')
                            <img src="{{asset('img/class_icon_Paladin.png')}}" alt="{{$char->vocation}}" style="width: 100%;height: auto;">
                            @elseif($char->vocation == 'Elite Knight' || $char->vocation == 'Knight')
                            <img src="{{asset('img/class_icon_Knight.png')}}" alt="{{$char->vocation}}" style="width: 100%;height: auto;">
                            @endif
                        </div>
                        <span class="Level tip tpd-delegation-uid-1" title="">{{$char->level}}</span>
                    </div>
                </div>
                <div class="Profile col-xs-6 col-6" style="max-width:100%; ">
                    <div class="Information" style="max-width: 100%;">
                        <span class="Name" style="max-width: 100%;" style="text-transform: uppercase;">{{$char->vocation}} - {{$char->level}}</span>
                        <div class="Rank" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="Information-detail" style="max-width: 100%;">
                        <small style="color:#666;">Anunciado por <a href="/user/{{usernick($char->user_id)}}" style="color:#444;">{{usernick($char->user_id)}}</a></small>
                    </div>

                    @if(auth::check())

                                    <div class="Buttons desktopbtn row " style="max-width: 100%;margin-top:20px;font-size: 1em;padding-bottom: 5px;">
                                    
                                    <div class="mr-2">
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$char->id}}" name="charid">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnblue">Enviar Mensagem</button>
                                      </form>                                     
                                       
                                    </div>
                                    <div class="">
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="proposal">
                                        <input type="hidden" value="{{$char->id}}" name="charid">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnblue">Oferecer Proposta</button>
                                      </form>
                                  </div>

                                           
                                    </div>  
                                    @else
                                    
                                    <div class="Buttons desktopbtn" style="max-width: 100%;margin-top:20px;font-size: 1em;padding-bottom: 5px;">

                                      <button data-toggle="tooltip" data-placement="bottom" title="Você não esta logado." class="btnred disabled">Enviar Mensagem</button>

                                   

                                      <button class="btnblue" data-toggle="tooltip" data-placement="bottom" title="Você não esta logado.">Oferecer Proposta</button>
                                         
                                        </div>
                                    @endif                                   
                </div>
                <div class="container">
                @if(auth::check())
                                
                                    <div class="mobilebtns " style="margin:0;margin-top:20px;font-size: 1em;padding-bottom: 5px;">

                                    <div style="margin-bottom: 10px;">
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$char->id}}" name="charid">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnblue">Enviar Mensagem</button>
                                      </form>    
                                      </div>    

                                    <div >
                                      <form action="/control-panel/messages/interested" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="1" name="proposal">
                                        <input type="hidden" value="{{$char->id}}" name="charid">
                                        <input type="hidden" value="{{$char->user_id}}" name="userid">
                                        <button type="submit" class="btnblue">Oferecer Proposta</button>
                                      </form>
                                      </div>
                                    
                                    </div>

                                           
                                                 
                                    @else
                                    <div class="Buttons mobilebtns" style="max-width: 100%;margin-top:20px;font-size: 1em;padding-bottom: 5px;">
                                   
                                      <button data-toggle="tooltip" data-placement="bottom" title="Você não esta logado." class="btnred disabled">Enviar Mensagem</button>

                                   

                                      <button class="btnblue" data-toggle="tooltip" data-placement="bottom" title="Você não esta logado.">Oferecer Proposta</button>
                                         </div>
                                        
                                    @endif
                                    </div>

                    


                
                
                <div class="LastUpdate">
                    Publicado para venda <span class="_timeago _timeCountAssigned tip" data-datetime="1538043820" data-type="" data-interval="60" title="{{$char->created_at}}">{{Carbon\Carbon::parse($char->created_at)->diffForHumans()}}</span>
                </div>
            </div>
           
            
            <div class="Menu" style="width: 100% !important;">

                <div class="MenuList tabHeaders" style="max-width: 100% !important;">
                    <div class="Item tabHeader active" id="dashboard">
                    <a href="#dashboard">Resumo</a>
                    </div>
                    <div class="Item tabHeader" id="contact">
                    <a href="#contato">
                        Contato
                    </a>
                    </div>
                    <div class="Item tabHeader" id="page_usernick" >
                    <a href="/user/{{usernick($char->user_id)}}">{{usernick($char->user_id)}}</a>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="life-owner LifeOwnerSummonerTopCenter">
                    <!-- TibiaSales.com 2 - 970x250 Fixed (5ba366a846e0fb0001bca397) - 970x250 - Place in <BODY> of page where ad should appear -->
                    {{-- <div class="vm-placement" data-id="5ba366a846e0fb0001bca397" style="width:970px;height:250px"></div> --}}
                    <!-- / TibiaSales.com 2 - 970x250 Fixed (5ba366a846e0fb0001bca397) -->
                </div>
                <div class="ContentWrap tabItems" id="SummonerLayoutContent">
                    <div class="opgg__notice-summoner-top"></div>
                    
                    <div class="tabItem Content SummonerLayoutContent summonerLayout-summary" style="width: 100% !important;">

                        <div class="SideContent col-sm-4">
                            
                            <div class="sub-tier">
                                <img src="{{asset('img/icon_vida.png')}}" class="Image sub-tier__medal">
                                <div class="sub-tier__info unranked">
                                    <div class="sub-tier__rank-type" style="color:#27cc4e;font-size: 1em;"><strong>{{$life}}</strong></div>
                                    <div class="sub-tier__rank-tier unranked" style="font-weight: 500;">
                                        Hit Points
                                    </div>
                                </div>
                            </div>
                            <div class="sub-tier">
                                <img src="{{asset('img/icon_mana.png')}}" class="Image sub-tier__medal">
                                <div class="sub-tier__info unranked">
                                    <div class="sub-tier__rank-type" style="color:#1c8aff;font-size: 1em;"><strong>{{$mana}}</strong></div>
                                    <div class="sub-tier__rank-tier unranked" style="font-weight: 500;">
                                        Mana
                                    </div>
                                </div>
                            </div>
                            <div class="TierBox Box">
                                <div class="SummonerRatingMedium">
                                    <div class="Medal tip tpd-delegation-uid-1" title="">
                                        @if($char->sex == 'male')
                                        @if($char->mage_hat)
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @else
                                        @if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        
                                        @endif
                                        @else
                                        {{-- Famele --}}
                                        @if($char->mage_hat)
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @else
                                        @if($char->vocation == 'Royal Paladin' || $char->vocation == 'Paladin' )
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @if($char->vocation == 'Elite Knight' || $char->vocation== 'Knight')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @if($char->vocation == 'Elder Druid' || $char->vocation== 'Druid')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        
                                        @if($char->vocation == 'Master Sorcerer' || $char->vocation== 'Sorcerer')
                                        <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10" style="width:104px;height:auto;" class="Image" />
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                    <div class="TierRankInfo">
                                        <div class="RankType">{{$char->world_type}}</div>
                                        <div class="TierRank">{{$char->vocation}}</div>
                                        <div class="TierInfo">
                                            <span class="LeaguePoints">
                                                Lv {{$char->level}}
                                            </span>
                                            /
                                            <span class="WinLose">
                                                <span class="wins">{{$life}}H</span>
                                                <span class="losses">{{$mana}}M</span>
                                                <br>
                                                <span class="winratio">Sex {{$char->sex}}</span>
                                            </span>
                                        </div>
                                        <div class="LeagueName">
                                            @if($char->premium == 1)
                                            <div class="LeagueName">
                                                Intermédio por conta da casa!
                                            </div>
                                            @else
                                            <div class="LeagueName">
                                                Anunciante {{usernick($char->user_id)}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>  
                             </div>

                                <div class="Box tabWrap stats-box _recognized" style="overflow: auto;background-color:#F2F2F2;">
                                    <div class="Tab">
                                        <ul class="TabList tabHeaders">
                                            <li class="Item tabHeader active" data-tab-show-class="overview-stats--all" data-type="Total">
                                                <a href="javascript:;">
                                                    Outros
                                                anúncios                                                   </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Content tabItems">
                                        <div class="MostChampionContent tabItem overview-stats--all" style="display: block;">
                                            <div class="MostChampionContent" data-summoner-id="2206889" data-season="11" data-last-info="7">
                                                
                                                @if(count($ads) > 0)
                                                @foreach($ads as $ad)
                                                <div class="ChampionBox Ranked">
                                                    <div class="Face">
                                                        <a href="/char/{{$ad->url}}" target="_blank">
                                                            @if($ad->sex == 'male')
                                                            @if($ad->mage_hat)
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=130&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @else
                                                            @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=129&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=134&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=144&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=145&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            
                                                            @endif
                                                            @else
                                                            {{-- Famele --}}
                                                            @if($ad->mage_hat)
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=141&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @else
                                                            @if($ad->vocation == 'Royal Paladin' || $ad->vocation == 'Paladin' )
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=137&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @if($ad->vocation == 'Elite Knight' || $ad->vocation== 'Knight')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=142&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @if($ad->vocation == 'Elder Druid' || $ad->vocation== 'Druid')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=148&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            
                                                            @if($ad->vocation == 'Master Sorcerer' || $ad->vocation== 'Sorcerer')
                                                            <img src="https://outfit-images.ots.me/animatedOutfits1090/animoutfit.php?id=149&addons=3&head=5&body=9&legs=18&feet=10" style="width:45px;height:auto;" />
                                                            @endif
                                                            @endif
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="ChampionInfo">
                                                        <div class="ChampionName" title="Vayne">
                                                            <a href="/char/{{$ad->url}}" target="_blank">
                                                                {{$ad->vocation}}
                                                            </a>
                                                        </div>
                                                        <div class="ChampionMinionKill tip" title="avg. CS (CS/m)">
                                                            Lv {{$ad->level}}
                                                        </div>
                                                    </div>
                                                    <div class="PersonalKDA">
                                                        <div class="KDA normal tip" title="(K 5.77 + A 5.37) / D 7.13">
                                                            <span class="KDA">{{$ad->world_type}}</span>
                                                            <span class="Text"></span>
                                                        </div>
                                                        <div class="KDAEach">
                                                            @if($ad->mage_hat == 1)
                                                            <span class="Kill"><img src="{{asset('img/hat-icon.png')}}" alt="Mage Hat" style="width: 16px;height: auto;"></span>
                                                            @endif
                                                            @if($ad->neon_sparkid_mount == 1)
                                                            <span class="Bar">/ <img src="{{asset('img/neon_sparkid-icon.png')}}" alt="Neon Sparkid Mount" style="width: 16px;height: auto;"></span>
                                                            @endif
                                                            @if($ad->elementalist_addon_2 == 1)
                                                            <span class="Death">/ <img src="{{asset('img/elemental-icon.png')}}" alt="Elementalist Addon 2" style="width: 16px;height: auto;"></span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="Played">
                                                        <div class="WinRatio normal tip" title="Taxa de Vitória">
                                                            
                                                        </div>
                                                        <div class="Title"><a href="/char/{{$ad->url}}">Show</a></div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                                <div class="MoreButton">
                                                    <a href="/" class="Action">Mostrar mais</a>
                                                </div>
                                                @else
                                                <div style="padding: 20px 0px 20px 0px;">
                                                    <center>Não existe nenhum anúncio para mostrar.</center>
                                                </div>
                                                
                                                @endif
                                            </div>               
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            

                                <div class="RealContent col-sm-8" style="width:100%;margin-left:0px;">
                                    <div class="GameListContainer">
                                        <div class="Header Box">
                                        </div>
                                        <style>
                                        .detail-show tr
                                        {
                                        
                                        overflow: auto;
                                        height: 30px;
                                        /*padding:20px 0px 20px 0px;*/
                                        border-bottom: 1px solid #fff;
                                        }
                                        .detail-show tr>td:first-child
                                        {
                                        width: 30%;
                                        font-weight: 700;
                                        }
                                        .detail-show tr td
                                        {
                                        padding-top:10px;
                                        padding-bottom:10px;
                                        }
                                        </style>
                                        <?php
                                        switch ($char->vocation) {
                                        case 'Royal Paladin':
                                        $key = 'Distance Fight';
                                        $skill = $char->distance_fight;
                                        break;
                                        case 'Paladin':
                                        $key = 'Distance Fight';
                                        $skill = $char->distance_fight;
                                        break;
                                        case 'Elite Knight':
                                        $rankSkill = [
                                        'Sword' => $char->sword_fight,
                                        'Axe' => $char->axe_fight,
                                        'Club' => $char->club_fight
                                        ];
                                        $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                                        $key = array_search($maxSkill, $rankSkill);
                                        $skill = $maxSkill;
                                        break;
                                        case 'Knight':
                                        $rankSkill = [
                                        'Sword' => $char->sword_fight,
                                        'Axe' => $char->axe_fight,
                                        'Club' => $char->club_fight
                                        ];
                                        $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                                        $key = array_search($maxSkill, $rankSkill);
                                        $skill = $maxSkill;
                                        break;
                                        default:
                                        $key = null;
                                        $skill = null;
                                        break;
                                        }
                                        ?>
                            <div class="Content" style="width: 100% !important;">
                                            <div class="opscore-banner">
                                                <div class="opscore-banner__header" style="height: auto !important;">
                                                    <div class="opscore-banner__wrapper" >
                                                        Anuncie seu personagem, aceite ou rejeite propostas. A escolha de vender, é sua.<div class="opscore-banner__wrapper--badge">New</div>
                                                    </div>
                                                    <div class="opscore-banner__header--button hide" style="color:#FFA302;"><a href="/sales" style="color:#FFA302;">
                                                        {{-- <img class="opscore-banner__header--button-icon opscore-banner__header--button-icon-spin" src="//opgg-static.akamaized.net/icon/icon-viewdetail-beta-down@2x.png"> --}}
                                                        <i class="fas fa-sign-in-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        {{-- Dashboard-content --}}
                                        <div class="GameItemList" id="dashboard-content" style="margin-left:0px;background-color:#A3CFEC;border:solid 1px #99b9cf;">

                                            {{-- Sobre o Char --}}
                                            <div class="GameItemWrap " >
                                                <div class="GameItem Win" >
                                                    <div class="Content" style="width:100% !important;border:none !important;">
                                                        <div class="GameStats" >
                                                            <div class="GameType">
                                                                Sobre<br>
                                                                <b>o Char</b>
                                                            </div>
                                                        </div>
                                                        <div class="GameDetail" style="border-right:solid 1px #99b9cf;">
                                                            <table width="100%;" class="detail-show">
                                                                
                                                                @if($char->hide_name == 0)
                                                                <tr>
                                                                    <td>Name</td>
                                                                    <td>{{$char->name}}</td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <td>Level</td>
                                                                    <td>{{$char->level}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Magic Level</td>
                                                                    <td>{{$char->magiclevel}}</td>
                                                                </tr>
                                                                @if($key != NULL && $skill != NULL)
                                                                <tr>
                                                                    <td>{{$key}}</td>
                                                                    <td>{{$skill}}</td>
                                                                </tr>
                                                                @endif
                                                                <tr style="border-bottom: 0;">
                                                                    <td>Shielding</td>
                                                                    <td>{{$char->shielding}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            {{-- Coisas Especiais --}}
                                            @if($char->mage_hat == 1 || $char->neon_sparkid_mount == 1 || $char->elementalist_addon_2 == 1)
                                            <div class="GameItemWrap">
                                                    <div class="GameItem Win"  data-summoner-id="27620140" data-game-time="1550622772" data-game-id="1591634015" data-game-result="win">
                                                        <div class="Content"  style="width:100% !important;border: 0;border-top:solid 1px #99b9cf;">
                                                            <div class="GameStats" >
                                                                <div class="GameType">
                                                                    Coisas<br>
                                                                    <b>Especiais</b>
                                                                </div>                                                                
                                                            </div>
                                                            <div class="GameDetail" style="border-right:solid 1px #99b9cf;">
                                                            <table width="100%;" class="detail-show">
                                                                @if($char->mage_hat == 1)
                                                                <tr>
                                                                    <td>Mage Addon 2</td>
                                                                    <td>Sim! <img src="{{asset('img/hat-icon.png')}}" alt="Mage Hat"></td>
                                                                </tr>
                                                                @endif
                                                                @if($char->elementalist_addon_2 == 1)
                                                                <tr>
                                                                    <td>Elementalist Addon 2</td>
                                                                    <td>Sim! <img src="{{asset('img/elemental-icon.png')}}" alt="Elementalist Addon 2"></td>
                                                                </tr>
                                                                @endif
                                                                @if($char->neon_sparkid_mount == 1)
                                                                <tr style="border-bottom: 0;">
                                                                    <td>Neon Sparkid Mount</td>
                                                                    <td>Sim! <img src="{{asset('img/neon_sparkid-icon.png')}}" alt="Neon Sparkid Mount"></td>
                                                                </tr>
                                                                @endif
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            @endif

                                            {{-- Sobre o Mundo --}}                                            
                                            <div class="GameItemWrap">
                                                <div class="GameItem Win"  data-summoner-id="27620140" data-game-time="1550622772" data-game-id="1591634015" data-game-result="win">
                                                    <div class="Content"  style="width:100% !important;border: 0;border-top:solid 1px #99b9cf;">
                                                        <div class="GameStats" >
                                                            <div class="GameType">
                                                                Sobre<br>
                                                                <b>o Mundo</b>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="GameDetail" style="border-right:solid 1px #99b9cf;">
                                                        <table width="100%;" class="detail-show">
                                                            @if($char->hide_world == 0)
                                                            <tr>
                                                                <td>World</td>
                                                                <td>{{$char->world}}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <td>World Type</td>
                                                                <td>{{$char->world_type}}</td>
                                                            </tr>
                                                            <tr style="border-bottom: 0;">
                                                                <td>Transfer Mode</td>
                                                                <td>{{$char->transfer}}</td>
                                                            </tr>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Preços --}}                                        
                                            <div class="GameItemWrap">
                                            <div class="GameItem Win"  data-summoner-id="27620140" data-game-time="1550622772" data-game-id="1591634015" data-game-result="win">
                                                <div class="Content"  style="width:100% !important;border: 0;border-top:solid 1px #99b9cf;">
                                                    <div class="GameStats" >
                                                        <div class="GameType">
                                                            Preço(s)
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="GameDetail" style="border-right:solid 1px #99b9cf;">
                                                    <table width="100%;" class="detail-show">
                                                        <tr>
                                                            <td>{{$char->moeda}}</td>
                                                            <td>{{$char->price}}</td>
                                                        </tr>
                                                        @if($char->accept_tc == 1)
                                                        <tr style="border-bottom: 0;">
                                                            <td>Tibia Coins</td>
                                                            <td>{{$char->price_tc}}</td>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

</div>
</div>
                    
                    
                    
                    {{-- Contact Dashboard --}}
                    <div class="GameItemList" id="contact-content" style="margin-top:10px;background-color:#A3CFEC;border:solid 1px #99b9cf;display:none;">
                        <div class="GameItemWrap" >
                            <div class="GameItem Win">
                                <div class="Content" style="width:100% !important;border:none !important;">
                                    <div class="GameStats" >
                                        <div class="GameType">
                                            Perfil do <br>
                                            <b>Vendedor</b>
                                        </div>
                                        
                                    </div>
                                    <div class="GameDetail" style="border-right:solid 1px #99b9cf;">
                                        <table width="100%;" class="detail-show">
                                            
                                            @if($char->whatsapp != null || $char->facebook != null)
                                            @if($char->whatsapp != null)
                                            <tr>
                                                <td>Whatsapp</td>
                                                <td>{{$char->whatsapp}}</td>
                                            </tr>
                                            @endif
                                            @if($char->facebook != null)
                                            <tr>
                                                <td>Facebook</td>
                                                <td>{{$char->facebook}}</td>
                                            </tr>
                                            @endif
                                            @else
                                            <tr><td></td><td>Este anunciante não cadastrou nenhuma rede social, envie uma mensagem!</td></tr>
                                            @endif
                                        </table>
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
<center>
<b>Este anuncio não esta ativo 😞</b><br><br>Este anuncio é seu? Ative-o no painel de controle, após fazer o <a href="/login">Login</a>.</center>
@endif
@endsection
@section('footer')
<div class="l-footer container" style="width:100%;position: relative;margin-top:-120px;overflow: auto;">
<div class="footer" style="width: 100%;">
<ul class="footer__links">
<li class="footer__links__item">
<a href="/terms">About TibiaSales.com</a>
</li>
<li class="footer__links__item">
<a href="/politica-de-privacidade">Política de Privacidade</a>
</li>
<li class="footer__links__item">
<a target="_blank" href="/help">Ajuda</a>
</li>
<li class="footer__links__item">
<a href="mailto:contact@tibiasales.com">Email</a>
</li>
<li class="footer__links__item">
<a href="/sales">Advertise</a>
</li>
<li class="footer__links__item">
<a href="mailto:contact@tibiasales.com">Feedback</a>
</li>

</ul>
<div class="footer__copyright">
© 2012-2019
TibiaSales.com
Database and website from
Brazil.

<ul class="footer__sns">
{{-- <li class="footer__sns__item footer__sns__item--twitter">
<a href="" target="_blank"><i>Twitter</i></a>
</li>
<li class="footer__sns__item footer__sns__item--instagram"><a href="" target="_blank"><i>Instagram</i></a>
</li>
<li class="footer__sns__item footer__sns__item--facebook"><a href="" target="_blank"><i>Facebook</i></a>
</li> --}}
</ul>
</div>
</div>

@endsection
@section("js")
<script>
    $(document).ready(function(){
         $('#toastnot').toast('show')

    })

    
   
$('#sdown').click(function(){
$('.slidenow').fadeToggle();
$('.__spSite-194').toggle();
$('.__spSite-193').toggle();
});
$('#contact').click(function(){
$('#dashboard-content').slideUp();
$('#contact-content').slideDown();
$('#dashboard').removeClass('active');
$('#contact').addClass('active');
});
$('#dashboard').click(function(){
$('#contact-content').slideUp();
$('#dashboard-content').slideDown();
$('#contact').removeClass('active');
$('#dashboard').addClass('active');
});
</script>
@endsection