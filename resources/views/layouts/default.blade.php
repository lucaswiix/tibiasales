<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/tibiaseller.png")}}" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>TibiaSales - @yield('title')</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->         
            <!-- Compiled and minified CSS -->
   {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{asset('css/app.css')}}">        
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/all.css') }}" rel="stylesheet">
        @yield('style')
    </head>
    <body>
<div id="loading-page"><img src="{{asset('/img/loading-page.gif')}}" alt=""></div>
{{-- Modal 1 --}}
@if(!auth::check())

<div class="modal fade " id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Entre no TibiaSales!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card bg-light card-body mb-3">
                            <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="username" class="col-form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email"
                                    name="email" value="{{ old('email') }}" required title="Please enter you Email" placeholder="example@gmail.com"> <span class="form-text"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Senha</label>
                                    <input type="password" class="form-control" id="password"
                                    name="password" required title="Please enter your password"> <span class="form-text"></span>
                                </div>
                                @if (isset($errors) && $errors->any())
                                <div id="loginErrorMsg" class="alert alert-error hide">
                                        @foreach ($errors->all() as $error)
                                          <font color="red">{{$error}}</font><br>
                                        @endforeach
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember">&nbsp;Lembrar de mim</label>
                                </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button> <a  href="{{ route('password.request') }}" class="btn btn-secondary btn-block">Não consigo entrar</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <p class="lead">Cadastre-se agora de <span class="text-success">GRAÇA!</span>
                        </p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> Anuncie seus chars ou itens</li>
                            <li><span class="fa fa-check text-success"></span> Faça uma proposta de compra</li>
                            <li><span class="fa fa-check text-success"></span> Adicione os favoritos</li>
                            <li><span class="fa fa-check text-success"></span> Entre em contato com interessados</li>
                            <li><span class="fa fa-check text-success"></span> Ganhe um anuncio gratis <small>(apenas novos anunciantes)</small>
                        </li>
                        <li><a href="/help"><u>Mais Vantagens</u></a>
                    </li>
                </ul>
                <p><a href="/register" class="btn btn-info btn-block">Criar uma conta Agora!</a>
            </p>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endif

{{-- // Fim Modal --}}
<?php $url = explode('/', $_SERVER["REQUEST_URI"]);
        if(!isset($url[2])) $url[2] = ''; ?>
@if(auth::check() && $url[2] == 'messages' )
{{-- Modal Send msg --}}
<div class="modal fade" id="modalNewMsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nova Mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group text-left">
                <label class="control-label">Assunto</label>
                <input type="text" class="form-control" name="subject" placeholder="Oferta"
                       value="{{ old('subject') }}">
        </div>

         <div class="form-group text-left">
                <label class="control-label">Mensagem</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

        @if($users->count() > 0)
            <div class="text-left">
            <label for="send_to">Destinatário:</label>
                <select id="send_to" name="recipients[]" class="form-control" id="">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{!!$user->nick!!}</label>
                    @endforeach
                </select>
            </div>
            @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btngreen">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Fim modal --}}
@endif
        <div class="page-wrapper">


       @yield('navbar')
   
    
        @yield('main_content')
        

        @yield('footer')

        @if(auth::check())
            @if(!auth::user()->facebook || !auth::user()->whatsapp)

            @endif
        @endif

        </div>  

        {{-- scripts --}}
        <script src="{{asset('js/jquery-3.js')}}"></script>

{{-- <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.js"></script>
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
                    $('#detalhes-char').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Distance Fight</span></div><input type="text" pattern="[0-9]+$" value="20" required autocomplete="off" name="distance" class="form-control text-right" maxlength="3"></div></div>');
                  
               }else if (c.vocation == 'Elite Knight' || c.vocation == 'Knight' ) {
                $('#detalhes-char').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Axe Fight</span></div><input type="text" pattern="[0-9]+$" value="20" name="axe" autocomplete="off" class="form-control text-right" maxlength="3"></div></div>');
                $('#detalhes-char').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Sword Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="sword" class="form-control text-right" maxlength="3"></div></div>');
                $('#detalhes-char').append('<div class="form-group col-sm-6"><div class="input-group" style="padding-left:0;max-w"><div class="input-group-prepend"><span class="input-group-text" id="">Club Fight<span></div><input type="text" autocomplete="off" value="20" pattern="[0-9]+$" name="club" class="form-control text-right" maxlength="3"></div></div>');
               }

               $('#sendcharname').val(c.name);
               $('#corpo-anunciar').fadeIn();             
        }
    },
    error: function(xhr) { // if error occured
        console.log(xhr);
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

      });
</script>
<script>
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


@yield('js')

<script>
    $('#submitchar').click(function(){
        $('#loading-page').fadeIn();
    });
</script>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- Compiled and minified JavaScript -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}


    </body>
</html>
