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
                <a href="/">Inicio</a>
                 <i class="fas fa-angle-right"></i>
                 <a href="/sales">Anunciar</a>
                 <i class="fas fa-angle-right"></i>                 
                  Criar conta
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
        <header>Criar Conta</header>
        <small>Anuncie, negocie e venda. Simples assim.</small>
        <div class="buttons">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" style="color:#666;">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nick') ? ' has-error' : '' }}">
                            <label for="nick" class="control-label">Nick <small>* Espaços são ignorados</small></label>

                            <div>
                                <script type="text/javaScript">
function Trim(str){
    return str.replace(/^\s+|\s+$/g,"");
}
</script>
                                <input id="nick" type="text" id="input_nome" class="form-control" name="nick" value="{{ old('nick') }}" required autofocus onkeyup="this.value = Trim( this.value )" autocomplete="off">
                            </div>
                            <small>O nome pelo char será conhecido.</small>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-mail</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <small>Nunca divulgaremos seu e-email, pode ficar tranquilo.</small>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Senha</label>

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
                            <label for="password-confirm" class="control-label">Confirmar Senha</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                
                <div class="form-group"><span class="forgotpass">Em criar a conta você concorda com os </span>
                <a class="forgotpass" href="/">termos de uso</a>.
                        </div>

                <div class="form-group">
                    <button type="submit" class="btn-fazerLogin" onclick="valida_nome()">
                    <i class="fas fa-sign-in-alt"></i>
                    Criar Conta</button>
                </div>
                    </form>
                    <div class="spacediv"></div>

                    <div class="no-acc">
                <span>Você já tem conta?</span>
                <a href="/login">Fazer Login</a><br>
            </div>

                </div>
            </div>
        </div>
    </div>
@endsection
