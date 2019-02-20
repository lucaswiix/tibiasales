@extends('layouts.default')

@section('navbar')
<nav class="navbar">
    @include('components/navbar_1')
    @include('components/navbar_2')
    </nav>
@endsection


@section('main_content')
<div class="allanunc col-md-12">
    <br><br><center><img src="{{asset('img/404.png')}}" alt=""><br><span style="font-size:2em;color:red;">Você se perdeu? </span><br /><br /> Não encontramos esta página.</center>
</div>
@endsection