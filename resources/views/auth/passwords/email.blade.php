@extends('layouts.default')
@section('title', 'TibiaSales - Recovery')
@section('navbar')
<nav class="navbar">
    @include('components/navbar_1')
    </nav>
@endsection
@section('main_content')
<div class="allanunc col-md-12">
    <div class="container-box">
        <div class="back-page">
            <div class="back-page"><a href="/">Inicio</a> <i class="fas fa-angle-right"></i> Login</div>
        </div>
        <div class="anunciar-box" align="center">
        <header>Recuperação</header>
        <small>Esqueceu a senha? Relaxa, vem comigo =)</small>
        <div class="buttons">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-mail</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn-sucess">
                                    Recuperar Senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
