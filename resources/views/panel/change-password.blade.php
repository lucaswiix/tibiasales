@extends('layouts.default')
@section('navbar')
<nav class="navbar">
    @include("components/navbar_1-admin")
</nav>
@endsection
@section('main_content')
<div class="container page-wrapper chiller-theme toggled" style="margin-top:4em;">
<div class="row" style="margin:0;">

        <main class="page-content justify-content-center col-xl-8 col-md-12 col-sm-12">
            <div class="container-fluid">

<div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Alterar senha</div>
 
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">

                        {{ csrf_field() }}
 
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
 
                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
 
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>
 
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
 
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm  Password</label>
 
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btnblue">
                                    Change Password
                                </button>
                            </div>
                        </div>                       
                        <div class="form-group text-left">
                        <a href="/control-panel/perfil">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                            
                               
    </div>
</div>
<script>
    $(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
</script>
@endsection