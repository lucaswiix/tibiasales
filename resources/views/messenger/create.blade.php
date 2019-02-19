@extends('layouts.default')
@section('navbar')
    <nav class="navbar">
        @include("components/navbar_1-admin")
        @include("components/navbar_2-admin")
    </nav>
@endsection

@section('main_content')
<div class="container">
        @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors as $erro)
            <strong>{{ $erro }}</strong><br>
            @endforeach
        </div>
        @endif
        
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif

         @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

    <div class="msging" style="text-align: center;margin-top: 20px;background-color:#fff;padding:20px;">
    @if(isset($intermedio))
    <h1>Solicitar Intermédio</h1>
    @elseif(isset($proposal) && $proposal == true)
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
                
                @if(isset($proposal) && $proposal == true)
                <label class="control-label">Assunto</label>
                <input type="text" class="form-control" name="subject" placeholder="Oferta"
                       value="[Proposta para {{ usernick($userid) }}]" disabled>
                @elseif(isset($intermedio))
                    <input type="hidden" class="form-control" name="subject" placeholder="Intermédio" value="[Intermédio]">
                @else
                <label class="control-label">Assunto</label>
                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                @endif
            </div>

            <!-- Message Form Input -->
            @if(isset($proposal) && $proposal == true)
            <div class="form-group text-left">
                <label class="control-label">Mensagem</label>
                <textarea name="message" class="form-control">Estou interessado no seu char nº {{$charid}}, minha proposta é </textarea>
            </div>
            @elseif(isset($intermedio))
            <div class="form-group text-left">
                <label class="control-label">Solicitar</label>
                <textarea name="message" class="form-control">Quero um intermédio para o link: </textarea>  
            </div>
            @else
            <div class="form-group text-left">
                <label class="control-label">Mensagem</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            @endif
            
            @if(isset($charid) && isset($userid))

            <div class="text-left">
            <label for="send_to">Destinatário:</label>
                <select id="send_to" name="recipients[]" class="form-control" id="send_to">
                        <option value="{{ $userid }}">{!! usernick($userid) !!}</label>
                </select>
            </div>

            @else                
                @if(isset($users))

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
                    @else
                        @if(isset($intermedio))
                        Não temos nenhum intermediário disponível.
                        @else
                        Não temos nenhum usuário disponível.
                        @endif
                    @endif

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
