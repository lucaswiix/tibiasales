@extends('layouts.default')
@section('navbar')
<nav class="navbar">
	@include("components/navbar_1-admin")
	@include("components/navbar_2-admin")
</nav>
@endsection
@section('background-pg', 'background-color:#e9eaee !important;background-image:none;')

@section('main_content')		

<div class="container emp-profile">
	@if (Session::has('error'))
    		<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
		@endif

		 @if (Session::has('success'))
    		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

        @if (Session::has('message'))
    		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{asset('img/tibiaprofiles.png')}}" alt="Profile"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                        	<div class="details" style="margin-bottom: 30px;">
                                    <h5>
                                        {{auth::user()->nick}}
                                    </h5>
                                    <h6>
                                        @if(isset($cargo))
                                        {{$cargo}}     
                                        @endif                                
                                    </h6>
                                    </div>
                                    {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contato</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        {{-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       {{--  <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> --}}
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row" style="height: 35px;">
                                            <div class="col-md-6">
                                                <label>Nick</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{auth::user()->nick}}</p>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 35px;">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 35px;">
                                            <div class="col-md-6">
                                                <label>Senha</label>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="/control-panel/change-password"><b>Alterar</b></a>
                                            </div>
                                        </div>  
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{route('changeContact')}}" method="post">
                            		{{csrf_field()}}
                                        <div class="row" style="height: 35px;">
                                            <div class="col-md-6">
                                                <label>Whatsapp</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" style="border-radius: 4px;border:1px solid #ccc;height:30px;padding-left: 10px;color:#666;" placeholder="+55 81 9 99999999" value="{{auth::user()->whatsapp}}" name="whatsapp"></p>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 35px;">
                                            <div class="col-md-6">
                                                <label>facebook</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" style="border-radius: 4px;border:1px solid #ccc;height:30px;padding-left: 10px;color:#666;" value="{{auth::user()->facebook}}" placeholder="fb.com/MeuPerfil" name="facebook"></p>
                                            </div>
                                        </div>
                                        <button type="submit" class="btngreen">Atualizar</button>
                                        </form>
                                        
                            </div>
                        </div>
                    </div>
                </div>         
        </div>
@endsection