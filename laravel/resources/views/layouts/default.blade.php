<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/tibiaseller.png")}}" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:title" content="TibiaSales">
        <meta property="og:site_name" content="TibiaSales">
        <meta property="og:description" content="Your website for sales, exchanges and ads for tibia.">
        <meta property="og:image" content="https://tibiasales.com/img/meta_image.jpg">
        <meta property="og:url" content="https://tibiasales.com/">
        <meta property="og:type" content="website">
        <meta property="fb:app_id" content="2221498281276853" />

        



        <title>TibiaSales - @yield('title')</title>

        <script src="{{asset('js/jquery-3.js')}}"></script>        
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9337175347480793",
    enable_page_level_ads: true
  });
</script>
        @yield('style')
    
    </head>
    <body style="@yield('background-pg')">
<div id="loading-page">
  <div id="closed-loading" style="color:#fff;position: absolute;top:0;right:0;margin-right: 20px;margin-top:20px;z-index: 999999999;cursor: pointer;">Travou? Fechar [X]</div>
  <img src="{{asset('/img/loading-page.gif')}}" alt="">
</div>
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
<div class="modal" id="lang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 0px;border:none;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Set Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="locale/pt-br">
        <button type="button" class="btndef">
           🇧🇷 Português
        </button>
        </a>

        <a href="locale/es">        
        <button type="button" class="btndef">
            🇪🇸 Español
        </button>
        </a>

        <a href="locale/en">        
        <button type="button" class="btndef">
          🇺🇸 English
        </button>
        </a>

        <a href="locale/pl">
        <button type="button" class="btndef">
           🇵🇱 Polski
        </button>
        </a>

      </div>
      <div class="modal-footer">
        <button type="button" class="btndef" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
        

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script>
 var clipboard = new ClipboardJS('.copy');

clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.js"></script>


@yield('js')

<script>
    $('#formChars').submit(function(){
        $('#loading-page').fadeIn();
    });
    $('#closed-loading').click(function(){
      $('#loading-page').fadeOut();
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