@extends('layouts.default')

@section("navbar")
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
        

        <div class="back-page">

            <div class="back-page">
                @if(App::IsLocale('es'))
                <a href="/"><i class="fas fa-home"></i> Inicio</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/sales">Anunciar</a> 
                <i class="fas fa-angle-right"></i>
                 Crear cuenta
                 @else
                 <a href="/"><i class="fas fa-home"></i> Home</a> 
                <i class="fas fa-angle-right"></i>
                <a href="/sales">Anunciar</a> 
                <i class="fas fa-angle-right"></i>
                 Criar Conta
                 @endif
             </div>
            </div>        
        <div class="anunciar-box" align="center" style="min-width: 500px;">
            @if(count($errors)>0)
            <div class="alert alert-danger col-sm-12" role="alert">
                <i class="fas fa-exclamation-triangle"></i> 
                <span style="font-weight: 500;margin-bottom: 20px;">Ocorreram os seguinte erros:</span><br><br>
                @foreach ($errors->all() as $error)
                    • {{$error}}<br>
                @endforeach
            </div>
            @endif
                @if(App::IsLocale('es'))
                <header>Crear Cuenta</header>
        <small>Anuncie, negocie y venda. Simples así.</small>

                @else
        <header>Criar Conta</header>
        <small>Anuncie, negocie e venda. Simples assim.</small>
        @endif
        <div class="buttons">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" style="color:#666;">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nick') ? ' has-error' : '' }}">
                @if(App::IsLocale('es'))

                            <label for="nick" class="control-label">Nickname <small>* Espacios son ignorados</small></label>
                            @else
                            <label for="nick" class="control-label">Nick <small>* Espaços são ignorados</small></label>
                            @endif

                            <div>
                                <script type="text/javaScript">
function Trim(str){
    return str.replace(/^\s+|\s+$/g,"");
}
</script>
                                <input id="nick" type="text" id="input_nome" class="form-control" name="nick" value="{{ old('nick') }}" required autofocus onkeyup="this.value = Trim( this.value )" autocomplete="off">
                            </div>
                @if(App::IsLocale('es'))
                            <small>El nombre por el que será conocido.</small>
                
                @else
                            <small>O nome pelo qual será conhecido.</small>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-mail</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                @if(App::IsLocale('es'))
                <small>Nunca divulgaremos su e-mail, puede estar tranquilo.</small>
                @else
                <small>Nunca divulgaremos seu e-email, pode ficar tranquilo.</small>
                @endif

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            @if(App::IsLocale('es'))
                    <label for="password" class="control-label">Contraseña</label>
                    @else
                    <label for="password" class="control-label">Senha</label>
                    @endif

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block" style="color:#B10000;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            @if(App::IsLocale('es'))
                    <label for="password" class="control-label">Confirmar contraseña</label>

                    @else
                    <label for="password" class="control-label">Confirmar senha</label>
                    @endif

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                
                
                <div class="form-group">
                            @if(App::IsLocale('es'))
                    <span class="forgotpass">En crear la cuenta usted concuerda con los </span>
                <a class="forgotpass" href="/terms">terminos de uso</a>.
                @else
                <span class="forgotpass">Em criar a conta você concorda com os </span>
                <a class="forgotpass" href="/terms">termos de uso</a>.
                @endif
                        </div>

                <div class="form-group">
                    <button type="submit" class="btn-fazerLogin" onclick="valida_nome()">
                    <i class="fas fa-sign-in-alt"></i>
                            @if(App::IsLocale('es'))
                            Crear Cuenta
                            @else
                    Criar Conta
                    @endif
                </button>
                </div>
                    </form>
                    <div class="spacediv"></div>

                    <div class="no-acc">
                        @if(App::IsLocale('es'))
                <span>¿Ya tienes cuenta?</span>
                <a href="/login">Hacer Login</a>
                <br>
                @else
                <span>Você já tem conta?</span>
                <a href="/login">Fazer Login</a>
                <br>
                @endif
            </div>

                </div>
            </div>
        </div>
    </div>
@endsection
