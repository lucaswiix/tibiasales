@extends('layouts.default')
@section('title', 'Anunciar')
@section('navbar')
<nav class="navbar">
           @include('components/navbar_1')
</nav>
@endsection

@section('main_content')
<div class="allanunc col-md-12">
            <div class="container-box">
                                @if ($errors->any())
                                <div id="loginErrorMsg" class="alert alert-danger hide">
                                        @foreach ($errors->all() as $error)
                                          <font color="red">{{$error}}</font><br>
                                        @endforeach
                                </div>
                                @endif
            <div class="back-page">
<a href="/"><i class="fas fa-home"></i> Inicio</a> <i class="fas fa-angle-right"></i> Anunciar
</div>
<div class="anunciar-box" align="center"> 
    @if(App::isLocale('es'))
    <header>Anunciar</header>
                <small>Divulgue, negocie y venda. Simples así.</small>
    @else
    <header>Anunciar</header>
                <small>Divulgue, negocie e venda. Simples assim.</small>

    @endif
                

                <div class="buttons">
                    @if(auth::check())
                    <div class="form-group">
                    <a href="/sellchar">                        
                    <button type="button" class="btnblue">
                        <img src="{{asset('img/link-char2.png')}}" alt="">
                        @if(App::isLocale('es'))
                        Anunciar Personaje
                            @else
                            Anunciar Personagem
                                @endif                  
                </button>                           
                    </a>
                    </div>
                    @else
                     <div class="form-group">
                         <button type="button" class="btndef" data-toggle="modal" data-target="#modalLogin">
                            <img src="{{asset('img/link-char.png')}}" alt="Anunciar Personagem">
                            @if(App::isLocale('es'))
                        Anunciar Personaje
                            @else
                            Anunciar Personagem
                                @endif  
                        </button>
                    </div>
                    @endif
                
                    
                    <div class="form-group">
                        <a href="#">
                    <button type="button" class="btndef" data-toggle="tooltip" data-placement="bottom" title="Disponível em breve">                        
                         <img src="{{asset('img/link-rare.png')}}" alt="">                     
                    Vender Rares</button>
                    </a>
                    </div>

                    <div class="form-group">
                        <a href="#">
                    <button type="button" class="btndef" data-toggle="tooltip" data-placement="bottom" title="Disponível em breve">                        
                         <img src="{{asset('img/link-tc.png')}}" alt="">                     
                    Vender Tibia Coins</button>
                    </a>
                    </div>
                    
                    <div class="spacediv"></div>
                    
                    @if(auth::check())
                    
                    <div class="no-acc"><span>Precisa de <a href="/help">ajuda</a>?</div>
                    @endif

                    @if(!auth::check())
                    <div class="form-group">
                    <a href="/login">
                     <button type="button" class="btn-fazerLogin" >
                        <i class="fas fa-sign-in-alt"></i>
                        @if(App::isLocale('es'))
                        Hacer Login
                        @else

                    Fazer Login
                    @endif
                </button>
                    </div>
                    </a>

                    

                    <div class="no-acc">
                        @if(App::isLocale('es'))
                        <span>¿No tienes cuenta?</span>
                        <a href="/register">Crear cuenta</a>
                        @else
                        <span>Não tem conta?</span>
                        <a href="/register">Criar conta</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection