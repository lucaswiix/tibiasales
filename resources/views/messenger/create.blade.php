@extends('layouts.default')
@section('navbar')
    <nav class="navbar">
        @include("components/navbar_1-admin")
        @include("components/navbar_2-admin")
    </nav>
@endsection

@section('main_content')
<div class="container">
    <div class="msging" style="text-align: center;margin-top: 20px;background-color:#fff;padding:20px;">
    @if(isset($intermedio))
    <h1>Solicitar Intermédio</h1>
    @elseif(isset($proposal) && is_numeric($proposal))
    <h1>Enviar Proposta</h1>
    @else
    <h1>Enviar mensagem</h1>
    @endif
    <div class="form" align="center">
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group text-left">
                <label class="control-label">Assunto</label>
                @if(isset($charnick))
                <input type="text" class="form-control" name="subject" placeholder="Oferta"
                       value="Estou interessado no {{ $charnick }}" disabled>
                @elseif(isset($intermedio))
                    <input type="text" class="form-control" name="subject" placeholder="Oferta"
                       value="[Intermédio]" disabled>
                @else
                <input type="text" class="form-control" name="subject" placeholder="Oferta"
                       value="{{ old('subject') }}">
                @endif
            </div>

            <!-- Message Form Input -->
            @if(isset($proposal) && is_numeric($proposal))
            <div class="form-group text-left">
                <label class="control-label">Mensagem</label>
                <textarea name="message" class="form-control">Estou interessado no seu char, minha proposta é </textarea>
            </div>
            @elseif(isset($intermedio))
            <div class="form-group text-left">
                <label class="control-label">Solicitar</label>
                @if(old('message'))            
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>           
                @else                
                <textarea name="message" class="form-control">Quero um intermédio para o link: </textarea>           
                @endif
            </div>
            @else
            <textarea name="message" class="form-control">{{ old('message') }}</textarea>  
            @endif
    
            @if(isset($charid) && isset($userid))
            <div class="text-left">
            <label for="send_to">Destinatário:</label>
                <select id="send_to" name="recipients[]" class="form-control" id="">                  
                        <option value="{{ $userid }}">{!! usernick($userid) !!}</label>
                </select>
            </div>
            @else
            
            @if($users->count() > 0)
            <div class="text-left">
                @if(isset($intermedio))
                    <label for="send_to">Intermediários:</label>
                @else
                    <label for="send_to">Destinatário:</label>
                @endif
                <select id="send_to" name="recipients[]" class="form-control" id="">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{!!$user->nick!!}</label>
                    @endforeach
                </select>
            </div>
            @endif
            @endif
        
            <!-- Submit Form Input -->
            <div class="form-group" style="margin:30px;">
                <button type="submit" class="btnred col-md-8">Enviar</button>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
@stop
