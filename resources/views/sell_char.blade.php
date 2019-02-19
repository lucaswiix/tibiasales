@extends('layouts.default')
@section('navbar')
<nav class="navbar">
    @include('components/navbar_1')
</nav>
@endsection
@section('main_content')
<div class="allanunc">
    <div class="container">

        @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors as $erro)
            <strong>{{ $erro }}</strong><br>
            @endforeach
            {{-- {{$errors}} --}}
        </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif
        
        
        <div class="col-md-8" style="text-align:left;display:inline-block;">
        @if(session()->has('charname'))
        <div class="alert alert-success">
            <i class="fas fa-check"></i> <b>Parabéns!</b><br> 
            O seu anuncio já esta em publico por 3 horas gratis! <br> Ative-o por <b>50</b> Tibia Coins e deixe-o permanente <a href="/donate/{{session('charid')}}">agora clicando aqui</a>!.
        </div>
        @endif
            <div class="back-page">
                <a href="/"><i class="fas fa-home"></i> Inicio</a> <i class="fas fa-angle-right"></i> <a href="/sales">Anunciar</a> <i class="fas fa-angle-right"></i> Personagem
            </div>
            
            
            <div class="regboxing col-md-12">
                <div class="boxsearch-char col-md-12" align="center">
                    <div class="input-group mb-3" style="margin-bottom:10px;">
                        <input type="text" class="form-control" id="character_name" placeholder="Nome do Personagem a ser anunciado" style="text-transform:capitalize;height: 43px !important;" aria-label="Nome do Personagem a ser anunciado" value="{{ old('nick') }}" aria-describedby="Nome do Personagem">
                        <div class="input-group-append">
                            <button class="btn-outblue" id="find_char" type="button">
                            <i class="fab fa-searchengin"></i> Buscar
                            </button>
                        </div>
                    </div>
                    <small class="text-muted loading-char">
                    {{--                                 <i class="fas fa-check"></i>
                    <i class="far fa-times-circle"></i>
                    Este personagem não foi encontrado.
                    Informações carregadas. --}}
                    </small>
                </div>
                <div class="spacediv"></div>
                <div id="corpo-anunciar" style="display:none;">
                    <span>Simulador:</span>
                    <div class="feed">
                        <div class="character-list">
                            <div class="character-infos">


                                <div class="img" style="background-image: url('img/artwork.png')">
                                    {{-- <div class="char-photoedit"><label for="anunc-photo">Enviar Foto</label>
                                    <input type="file" id="anunc-photo"></div> --}}
                                </div>


                                <div class="body-char">
                                    <h4 class="header">[<span class="voc">ED</span>] Level <span class="level">465</span> - <span class="world-type">Open PvP</span></h4>
                                    <div class="text">
                                        <ul style="color:#666;font-size:0.9em;" id="char-details">
                                            {{-- <li class="world"><i class="fas fa-globe-americas"></i> Impera</li>
                                            <li class="transfer"><i class="fas fa-exchange-alt"></i> Transfer Normal</li>
                                            <li class="hat"><i class="fab fa-pied-piper-hat"></i> Mage Hat</li>
                                            <li class="achivement"><i class="fas fa-trophy"></i> 1020 Achivements</li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="price">
                                    <small>Preço</small>
                                    <span class="value">R$ 0,00</span>
                                    <small>U$ 0</small>
                                    
                                    <div class="next-button">
                                        <button type="button" class="btnred" style="cursor:not-allowed;" disabled>Eu quero!</button>
                                    </div>
                                    
                                    <div class="footer">
                                        <small>Anunciado por</small>
                                        @if(auth::check())
                                        <span style="text-transform: capitalize;">{{auth::user()->nick}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="spacediv"></div>
                    <form action="{{route('characters.store')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="name" id="sendcharname">
                        <h6 style="font-weight: 600;">Skills: </h6>
                        <div id="infosChar">
                        <div id="">
                            <div class="row" id="detalhes-char" style="margin:0;padding: 0;">
                                <div class="form-group col-sm-6">
                                    <div class="input-group " style="padding-left:0;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Magic Level</span>
                                        </div>
                                        <input type="text" name="magiclevel" autofocus pattern="[0-9]+$" autocomplete="off" class="form-control text-right" maxlength="3">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group" style="padding-left:0;max-w">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Shielding</span>
                                        </div>
                                        <input type="text" name="shielding" value="20" autocomplete="off" pattern="[0-9]+$" class="form-control text-right" maxlength="3">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="spacediv"></div>
                            <h3 style="font-weight: 600;">Algo de especial?</h3><br>
                            <h5>Addon/Mounts raras</h5>
                            <div class="form-group">
                                <input type="checkbox" value="1" name="magehat" id="hat">
                                <label for="hat">Mage Hat</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" value="1" name="elemental2" id="element">
                                <label for="element">Elementalist Addon 2</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" value="1" name="neonsparkid" id="neon">
                                <label for="neon">Neon Sparkid Mount</label>
                            </div>
                            <h5>Privacidade</h5>
                            <div class="form-group">
                                <input type="checkbox" value="1" name="hidenick" id="hidenick" checked>
                                <label for="hidenick">Esconder o Nick do personagem</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" value="1" name="hideworld" id="hideworld">
                                <label for="hideworld">Esconder o Mundo</label>
                            </div>
                            <div class="form-group">
                                <h6 style="font-weight: 600;">Descrição</h6>
                                <textarea name="description" id="" placeholder="Seja objetivo, coloque apenas as coisas importantes." class="form-control" cols="10" rows="3"></textarea>
                            </div>
                        </div>
                        <h6>Valores</h6>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group" style="padding-left:0;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">R$</span>
                                    </div>
                                    <input type="text" name="price" class="form-control col-md-4" autocomplete="off" style="text-align:right;" maxlength="6" pattern="[0-9]+$">
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <div class="input-group" style="padding-left:0;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">U$</span>
                                    </div>
                                    <input type="text" class="form-control col-md-4" style="text-align:right;" maxlength="6" disabled value="">
                                </div>
                            </div> --}}
                        </div>
                        <div class="clearfix"></div>
                        <div class="spacediv"></div> 
                        <div class="publicardiv " align="right"><a href="/sales">
                        <button type="button" class="btndef" onclick="return confirm('Tem certeza que deseja sair?');">Cancelar</button></a>
                        <button type="submit" id="submitchar" class="btnred">Publicar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection