@extends('layouts.default')

@section('navbar')
<nav class="navbar">
    @include('components/navbar_1')
    @include('components/navbar_2')
    </nav>
@endsection


@section('main_content')
<div class="allanunc col-md-12">
    <img src="{{asset('img/photo-babynoob.png')}}" alt=""><br>
    <h3>Hum...</h3><h4> Parece que este anúncio não existe 😐</h4>
</div>
@endsection