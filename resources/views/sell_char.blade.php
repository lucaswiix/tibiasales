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
        <script>
            $(document).ready(function() {
                $('#advertising').modal('show');
            });
        </script>
<div class="modal fade" id="advertising" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
@if (App::isLocale('en'))
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 0 !important;">
        <h4 class="modal-title" id="exampleModalLongTitle">Posted, Uhuuu!! 🤑</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <font color="green"><small><i>You have earned 24 hours of advertising free listing!</i></small></font>
        <div class="bodymodal" style="margin-top:20px;">
            Donate <b>50 Tibia Coins</b> and get <b>15 days of advertisement</b>! 🤝<br> <small>Limited time promotion! (Activate your ad by 50 Tibia coins).</small>
            <br>
            <div class="text-center" style="margin-top:50px;margin-bottom: 50px;">
                <a href="/donate/{{session('charid')}}">
                <button type="button" class="btngreen col-md-10">Enable Ad</button>
                </a>
            </div>
            

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btndef" data-dismiss="modal">Later</button>
      </div>
    </div>
@elseif(App::isLocale('es'))
<div class="modal-content">
      <div class="modal-header" style="border-bottom: 0 !important;">
        <h4 class="modal-title" id="exampleModalLongTitle">Publicado, Uhuuu!! 🤑</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <font color="green"><small><i>¡Usted ganó 24 horas de anuncio gratis!</i></small></font>
        <div class="bodymodal" style="margin-top:20px;">
            Doe <b>50 Tibia Coins</b> y gane <b>15 días de anuncio</b>! 🤝<br> 
            <small>¡Promoción por tiempo limitado! (Activa tu anuncio por 50 Tibia Coins).</small>
            <br>
            <div class="text-center" style="margin-top:50px;margin-bottom: 50px;">
                <a href="/donate/{{session('charid')}}">
                <button type="button" class="btngreen col-md-10">Activar Publicidad</button>
                </a>
            </div>
            

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btndef" data-dismiss="modal">Después</button>
      </div>
    </div>
@else
<div class="modal-content">
      <div class="modal-header" style="border-bottom: 0 !important;">
        <h4 class="modal-title" id="exampleModalLongTitle">Postado, Uhuuu!! 🤑</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <font color="green"><small><i>Você ganhou 24 horas de anúncio grátis!</i></small></font>
        <div class="bodymodal" style="margin-top:20px;">
            Doe <b>50 Tibia Coins</b> e ganhe <b>15 dias de anúncio</b>! 🤝<br> <small>Promoção por tempo limitado! (Ative seu anúncio por 50 Tibia coins).</small>
            <br>
            <div class="text-center" style="margin-top:50px;margin-bottom: 50px;">
                <a href="/donate/{{session('charid')}}">
                <button type="button" class="btngreen col-md-10">Ativar Anuncio</button>
                </a>
            </div>
            

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btndef" data-dismiss="modal">Depois</button>
      </div>
    </div>
@endif

  </div>
</div>
{{-- 
        <div class="alert alert-success">
            <i class="fas fa-check"></i> <b>Uhuuu! 🤑</b><br> 
            O seu anúncio já esta em publico por 24 horas grátis!<br> <b>Ative o anuncio por até 30 dias <a href="/donate/{{session('charid')}}">aqui!</a></b>
        </div> --}}
        @endif
            <div class="back-page">
                <a href="/"><i class="fas fa-home"></i> Inicio</a> <i class="fas fa-angle-right"></i> <a href="/sales">Anunciar</a> <i class="fas fa-angle-right"></i> Personagem
            </div>
            
            
            <div class="regboxing col-md-12">
                <div class="boxsearch-char col-md-12" align="center">
                    <div class="input-group mb-3" style="margin-bottom:10px;">
                        <input type="text" class="form-control" id="character_name" placeholder="@lang('home.sell_char-placeholder')" style="text-transform:capitalize;height: 43px !important;" aria-label="Nome do Personagem a ser anunciado" value="{{ old('nick') }}" aria-describedby="Nome do Personagem">
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
                    <form action="{{route('characters.store')}}" id="formChars" onsubmit="return validachars(this);" method="POST">
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
                                        <input type="text" name="magiclevel" autofocus pattern="[0-9]+$" autocomplete="off" class="form-control text-right onlynumbers" maxlength="3">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group" style="padding-left:0;max-w">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Shielding</span>
                                        </div>
                                        <input type="text" name="shielding" value="20" autocomplete="off" pattern="[0-9]+$" class="form-control text-right onlynumbers" maxlength="3">
                                    </div>
                                </div>
                            </div>
                                <div class="row" id="char-skills" style="margin:0;padding: 0;">                                   
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
                        <h6>@lang('home.money-and-price')</h6>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group" style="padding-left:0;">
                                    <div class="input-group-prepend">
                                        @if (Config::get('app.locale') == 'en')
                                        <select name="moeda" class="input-group-text">
                                            <option value="U$">U$</option>
                                            <option value="R$">R$</option>
                                            <option value="MXN">MXN</option>   
                                        </select>
                                        @elseif(Config::get('app.locale') == 'es')
                                        <select name="moeda" class="input-group-text">
                                            <option value="MXN">MXN</option>
                                            <option value="U$">U$</option> 
                                            <option value="R$">R$</option>                                              
                                        </select>
                                        @else
                                        <select name="moeda" class="input-group-text">
                                            <option value="R$">R$</option>
                                            <option value="U$">U$</option>
                                            <option value="MXN">MXN</option>   
                                        </select>
                                        @endif
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
                        <div class="row">
                        <div class="form-group col-sm-6">
                           @if (App::isLocale('es'))
                            <label><input type="checkbox" name="accept_coins" id="accept-tibiacoins" value="1"> Acepto Tibia coins forma de pago</label>
                            @else
                            <label><input type="checkbox" name="accept_coins" id="accept-tibiacoins" value="1"> Aceito Tibia coins como forma de pagamento</label>
                            @endif

                        <div class="input-group coinscb" style="margin-top:20px;padding-left:0;display:none;">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Tibia coins</div>
                            </div>

                            <input type="text" name="tibiacoins" class="form-control col-md-4" pattern="[0-9]+$" autocomplete="off" style="text-align: right;" maxlength="10" placeholder="1000">
                            
                        </div>
                            
                        </div>
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
@section('js')
@if (App::isLocale('es'))
    <script>
$(document).ready(function(){

      $('#find_char').click(function(){
        // alert('oi');
            var nome = $('#character_name').val();
            var get = nome.replace(/\s+/g, '+');
            
 
$.ajax({
    type: 'get',
        url: '{{route('findchar')}}', 
     data: {
        "_token": "{{ csrf_token() }}",
        'char' : get,
        },
    beforeSend: function() {
         $('#corpo-anunciar').fadeOut();
         $('#char-details').html('');
         $('#char-skills').html('');
        $('.loading-char').html('<i class="fas fa-spinner fa-spin"></i> Cargando información...');
    },
    success: function(data) {
        var c = data['characters']['data'];        

        if(data['characters']['error'] != null){
            $('.loading-char').html('<i class="far fa-times-circle"></i> Este personaje no fue encontrado.');
        }else{           
             $('.loading-char').html('<i class="fas fa-check"></i> Información cargada.');
             $('.level').html(c.level);
             $('.voc').html(c.vocation);

            $('.world-type').html(data['characters']['data'][0]['world_type']);

            $('#char-details').append('<li class="char_name" style="display:none;"><img src="/img/char-icon.png"> '+c.name+'</li>');

            $('#char-details').append('<li class="magehat" style="display:none;color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>');
            $('#char-details').append('<li class="elementalist2" style="display:none;"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>');
            $('#char-details').append('<li class="neonsparkid" style="display:none;color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>');
            
             $('#char-details').append('<li class="world"><i class="fas fa-globe-americas"></i> '+c.world+'</li>');
             

             

             

             if(c.former_world){
             $('#char-details').append('<i class="fas fa-exchange-alt"></i> Transfer Express</li>');
            }else{
             $('#char-details').append('<i class="fas fa-exchange-alt"></i> Transfer Normal</li>');            
               }

               if (c.vocation == 'Royal Paladin' || c.vocation == 'Paladin') {
                    $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Distance Fight</span></div><input type="text" pattern="[0-9]+$" value="20" required autocomplete="off" name="distance" class="form-control text-right" maxlength="3"></div></div>');
                  
               }else if (c.vocation == 'Elite Knight' || c.vocation == 'Knight' ) {
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Axe Fight</span></div><input type="text" pattern="[0-9]+$" value="20" name="axe" autocomplete="off" class="form-control text-right" maxlength="3"></div></div>');
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Sword Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="sword" class="form-control text-right" maxlength="3"></div></div>');
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Club Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="club" class="form-control text-right" maxlength="3"></div></div>');
               }

               $('#sendcharname').val(c.name);
               $('#corpo-anunciar').fadeIn();             
        }
    },
    error: function(xhr) { // if error occured
        // console.log(xhr);
        $('.loading-char').html('<i class="far fa-times-circle"></i> Este personaje no fue encontrado.');
    },
    complete: function() {
        // console.log('Tudo certo!');
    },
});

  });

      $('#hidenick').click(function(){
        $('.char_name').toggle();
      });
      $('#hideworld').click(function(){
        $('.world').toggle();
      });

      $('#hat').click(function(){
        $('.magehat').toggle();
      });
      $('#element').click(function(){
        $('.elementalist2').toggle();
      });
      $('#neon').click(function(){
        $('.neonsparkid').toggle();
      });
      
      $('#accept-tibiacoins').click(function(){
        $('.coinscb').toggle();
      });


      });
</script>
@else
    <script>
$(document).ready(function(){

      $('#find_char').click(function(){
        // alert('oi');
            var nome = $('#character_name').val();
            var get = nome.replace(/\s+/g, '+');
            
 
$.ajax({
    type: 'get',
        url: '{{route('findchar')}}', 
     data: {
        "_token": "{{ csrf_token() }}",
        'char' : get,
        },
    beforeSend: function() {
         $('#corpo-anunciar').fadeOut();
         $('#char-details').html('');
         $('#char-skills').html('');
        $('.loading-char').html('<i class="fas fa-spinner fa-spin"></i> Carregando informações...');
    },
    success: function(data) {
        var c = data['characters']['data'];        

        if(data['characters']['error'] != null){
            $('.loading-char').html('<i class="far fa-times-circle"></i> Este personagem não foi encontrado.');
        }else{           
             $('.loading-char').html('<i class="fas fa-check"></i> Informações carregadas.');
             $('.level').html(c.level);
             $('.voc').html(c.vocation);

            $('.world-type').html(data['characters']['data'][0]['world_type']);

            $('#char-details').append('<li class="char_name" style="display:none;"><img src="/img/char-icon.png"> '+c.name+'</li>');

            $('#char-details').append('<li class="magehat" style="display:none;color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>');
            $('#char-details').append('<li class="elementalist2" style="display:none;"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>');
            $('#char-details').append('<li class="neonsparkid" style="display:none;color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>');
            
             $('#char-details').append('<li class="world"><i class="fas fa-globe-americas"></i> '+c.world+'</li>');
             

             

             

             if(c.former_world){
             $('#char-details').append('<i class="fas fa-exchange-alt"></i> Transfer Express</li>');
            }else{
             $('#char-details').append('<i class="fas fa-exchange-alt"></i> Transfer Normal</li>');            
               }

               if (c.vocation == 'Royal Paladin' || c.vocation == 'Paladin') {
                    $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Distance Fight</span></div><input type="text" pattern="[0-9]+$" value="20" required autocomplete="off" name="distance" class="form-control text-right" maxlength="3"></div></div>');
                  
               }else if (c.vocation == 'Elite Knight' || c.vocation == 'Knight' ) {
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Axe Fight</span></div><input type="text" pattern="[0-9]+$" value="20" name="axe" autocomplete="off" class="form-control text-right" maxlength="3"></div></div>');
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Sword Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="sword" class="form-control text-right" maxlength="3"></div></div>');
                $('#char-skills').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Club Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="club" class="form-control text-right" maxlength="3"></div></div>');
               }

               $('#sendcharname').val(c.name);
               $('#corpo-anunciar').fadeIn();             
        }
    },
    error: function(xhr) { // if error occured
        // console.log(xhr);
        $('.loading-char').html('<i class="far fa-times-circle"></i> Este personagem não foi encontrado.');
    },
    complete: function() {
        // console.log('Tudo certo!');
    },
});

  });

      $('#hidenick').click(function(){
        $('.char_name').toggle();
      });
      $('#hideworld').click(function(){
        $('.world').toggle();
      });

      $('#hat').click(function(){
        $('.magehat').toggle();
      });
      $('#element').click(function(){
        $('.elementalist2').toggle();
      });
      $('#neon').click(function(){
        $('.neonsparkid').toggle();
      });
       $('#accept-tibiacoins').click(function(){
        $('.coinscb').toggle();
      });

      });
</script>
@endif
<script>
  function validachars(frm){

    if(frm.magiclevel.value == "" || frm.magiclevel.value == null || frm.magiclevel.value.lenght > 3) {
      
      return false;
    }


  }


    function valida_nome() {
        var filter_nome = /^([a-zA-Z]|)+$/;
        if (!filter_nome.test(document.getElementById("input_nome").value)) {
            document.getElementById("input_nome").value = '';
            document.getElementById("input_nome").placeholder = "Nome inválido";
            document.getElementById("input_nome").style.borderColor = "#ff0000";
            document.getElementById("input_nome").style.outline = "#ff0000";
            document.getElementById("input_nome").focus();
            document.getElementById("input_nome").onkeydown = function keydown_nome() {
                document.getElementById("input_nome").placeholder = "";
                document.getElementById("input_nome").style.borderColor = "#999999";
                document.getElementById("input_nome").style.outline = null;
            }
            return false;
        } else {
            document.getElementById("input_nome").value = '';
            document.getElementById("input_nome").placeholder = "Nome Válido";
        }
        return true;
    }

</script>
@endsection