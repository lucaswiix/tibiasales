@extends('layouts.default')

@section('navbar')
<nav class="navbar">
           @include('components/navbar_1')
</nav>
@endsection

@section('main_content')
            <div class="allanunc col-md-12">
                <div class="register-page ">
                    <div class="register-box">
                        <div class="back-page"><a href="/">Inicio</a> <i class="fas fa-angle-right"></i> <a href="/anunciar">Anunciar</a> <i class="fas fa-angle-right"></i> Personagem</div>
                        <div class="regboxing">
                            <div class="boxsearch-char col-md-12" align="center">
                                <div class="input-group mb-3" style="margin-bottom:10px;">
                                    <input type="text" class="form-control character_name" placeholder="Nome do personagem" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn-outblue" id="find_char" type="button"><i class="fab fa-searchengin"></i> Buscar</button>
                                    </div>
                                </div>
                                <small class="loading-char text-muted">
                                <i class="fas fa-check"></i>
                                {{-- <i class="far fa-times-circle"></i> --}}
                                {{-- Este personagem não foi encontrado. --}}
                                Informações carregadas.
                                </small>
                            </div>
                            <div class="spacediv"></div>
                            <span>Simulador:</span>
                            <div class="feed">
                                <div class="character-list">
                                    <div class="character-infos">
                                        <div class="img">
                                        </div>
                                        <div class="body-char">
                                            <h4 class="header">[ED] Level 465 - Open PvP</h4>
                                            <div class="text">
                                                <ul class="text-hide">
                                                    <li><i class="fas fa-globe-americas"></i> Impera</li>
                                                    <li><i class="fas fa-exchange-alt"></i> Transfer Normal</li>
                                                    <li><i class="fab fa-pied-piper-hat"></i> Mage Hat</li>
                                                    <li><i class="fas fa-trophy"></i> 1020 Achivements</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <small>Preço</small>
                                            <span class="value">R$ 1,860</span>
                                            <small>U$ 450</small>
                                            
                                            <div class="next-button">
                                                <button type="button" class="btnred" style="cursor:not-allowed;" disabled>Eu quero!</button>
                                            </div>
                                            
                                            <div class="footer">
                                                <small>Anunciado por</small>
                                                <span>Lucaswiix</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="spacediv"></div>
                            <h3>Detalhes do personagem <a href="#" id="hide">Hide</a></h3>
                            <div class="detalhes-char">
                                <div class="form-group">
                                    <div class="input-group" style="padding-left:0;max-w">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Magic Level</span>
                                        </div>
                                        <input type="text" class="form-control col-md-2" value="205" maxlength="3">
                                    </div>
                                </div>
                                <h6>Addons/Mounts</h6>
                                <div class="form-group">
                                    <input type="checkbox" id="hat">
                                    <label for="hat">Mage Hat</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="element">
                                    <label for="element">Elementalist Addon 2</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="neon">
                                    <label for="neon">Neon Sparkid Mount</label>
                                </div>
                                <h6>Privacidade</h6>
                                <div class="form-group">
                                    <input type="checkbox" id="hidenick" checked>
                                    <label for="hidenick">Esconder o Nick do personagem</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="hideworld">
                                    <label for="hideworld">Esconder o Mundo</label>
                                </div>
                                <h6>Acessos</h6>
                                <div class="form-group">
                                    <input type="checkbox" id="oramond">
                                    <label for="oramond">Oramond Squire(500 pts)</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="oramond3">
                                    <label for="oramond3">Oramond Citizen(300 pts)</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="wote">
                                    <label for="wote">Wrath of the Emperor Quest</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="inqui">
                                    <label for="inqui">The Inquisition Quest</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="ferumbras">
                                    <label for="ferumbras">Ferumbras' Ascendant Quest</label>
                                </div>
                            </div>
                            <h6>Valores</h6>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="input-group" style="padding-left:0;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">R$</span>
                                        </div>
                                        <input type="text" class="form-control col-md-4" style="text-align:right;" maxlength="6" value="400">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group" style="padding-left:0;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">U$</span>
                                        </div>
                                        <input type="text" class="form-control col-md-4" style="text-align:right;" maxlength="6" disabled value="127">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="spacediv"></div>
                            <h3>Criar conta ou <a href="" id="alreadyacc">já possuo conta</a></h3>
                            <div class="createacc">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="nick">Crie um Nick</label>
                                        <input type="text" id="nick" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <input type="text" id="email" class="form-control" placeholder="email@mail.com">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Senha</label>
                                        <input type="password"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="confirmsenha">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="confirmsenha">
                                    </div>
                                </div>
                            </div>
                            <div class="loginacc" style="display:none;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail:</label>
                                        <input type="text" id="email" class="form-control" placeholder="seuemail@email.com">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="senha">Senha:</label>
                                        <input type="password" id="senha" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="publicardiv " align="right">
                                <button type="button" class="btndef">Cancelar</button>
                                <button type="button" class="btnred">Publicar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection