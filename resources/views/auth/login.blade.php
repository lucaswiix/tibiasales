@extends('layouts.default')
@section("title", 'TibiaSales - Login')
@section('navbar')
<nav class="navbar">
    <div class="nav1">
        <div class="nav1-item-header container">
            <div class="logo">
                <a href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>                
            </div>           
        </div>
    </div>
</nav>
@endsection

@section('main_content')
<div class="allanunc col-md-12">
    <div class="container-box">
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif

        <div class="back-page">
            <div class="back-page">
                @if(App::IsLocale('es'))
                <a href="/"><i class="fas fa-home"></i> Inicio</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/sales">Anunciar</a> 
                <i class="fas fa-angle-right"></i>
                 Login</div>
                 @else
                 <a href="/"><i class="fas fa-home"></i> Home</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/sales">Anunciar</a> 
                <i class="fas fa-angle-right"></i>
                 Login</div>
                 @endif
        </div>
        <div class="anunciar-box" align="center">
             @if(App::IsLocale('es'))
             <header>Hacer Login</header>
        <small>Tenga acceso a sus anuncios.</small>
             @else
        <header>Fazer Login</header>
        <small>Tenha acesso aos seus anúncios.</small>
        @endif
        <div class="buttons">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail</label>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block" style="color:red;font-size:0.8em;top:10px;">
                            <span>{{ $errors->first('email') }}</span>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    @if(App::IsLocale('es'))
                    <label for="password" class="control-label">Contraseña</label>

                    @else
                    <label for="password" class="control-label">Senha</label>
                    @endif
                    <div>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <a class="forgotpass" href="{{ route('password.request') }}">
                            @if(App::IsLocale('es'))                                 
                                Olvidé mi contraseña
                    @else
                                                       Esqueci a minha senha

                    @endif
                                   
                        </a>
                    </div>
                </div>

                <input hidden type="checkbox" name="remember" checked>
                
        
                <div class="form-group">
                    <button type="submit" class="btn-fazerLogin">
                    <i class="fas fa-sign-in-alt"></i>
                    Entrar</button>
                </div>
            </form>
            
            <div class="spacediv"></div>
            
            
            <div class="no-acc">
                @if(App::isLocale('es'))
                        <span>¿No tienes cuenta?</span>
                        <a href="/register">Crear cuenta</a>
                        @else
                        <span>Não tem conta?</span>
                        <a href="/register">Criar conta</a>
                        @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
 
