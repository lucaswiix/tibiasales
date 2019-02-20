            <div class="nav1">
                <div class="nav1-item-header container">
                    <div class="logo">
                    <a href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
                        
                    </div>
                
                
                    <div class="central-atendimento">
                        <a href="#" class="central-a-link">
                            <img src="{{asset('img/logo-phone.png')}}" alt="">
                            <div class="central-text">                                
                                <span>@lang('home.call-center')</span>                                
                            </div>
                        </a>
                    </div>

                    <div class="right-header" id="right-header-nav">
                        <div class="link-item">
                            <a class="header-autogestion-link" data-toggle="modal" data-target="#lang" style="cursor: pointer;">
                            {{-- <i class="fas fa-globe-americas"></i> --}}
                            <i class="fas fa-language"></i>
                            <div class="right-item-box">
                                <small>{{Config::get('app.locale')}}</small>
                            </div>
                            </a>                            
                        </div>

                        @if(Auth::check())
                        <div class="link-item">
                            <a href="/control-panel" class="header-autogestion-link">
                            <i class="fas fa-user-tie"></i>
                            <div class="right-item-box">
                                <span>{{auth::user()->nick}}</span>
                                <small>@lang('home.my-account')</small>
                            </div>
                            </a>                            
                        </div>
                        @else
                        <div class="link-item">
                            <a href="/login" class="header-autogestion-link">
                            <i class="fas fa-user-alt"></i>
                            <div class="right-item-box">
                                <span>Iniciar Sessão</span>
                                <small>@lang('home.my-account')</small>
                            </div>
                            </a>                            
                        </div>
                        @endif
                        <div class="link-item">
                            <a href="/sales" class="header-autogestion-link">
                            <i class="fas fa-briefcase"></i>
                            <div class="right-item-box">
                                <span>@lang('home.make-business')</span>
                                <small>Anunciar</small>
                            </div>
                        </a>
                            
                        </div>
                        <div class="link-item" >
                            <a href="/help" class="header-autogestion-link">
                            <i class="fas fa-question-circle"></i>
                                <span>@lang('home.help')</span>
                            </a>
                        </div>

                    </div>
                     
                     <div class="icons row iconsmbcheck" >
                        <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                            <a href="/login" class="header-autogestion-link" style="color:#444;">
                            <i class="fas fa-sign-in-alt"></i>                              
                            </a>
                        </div>

                        <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                            <a href="/sales" class="header-autogestion-link" style="color:#444;">
                            <i class="fas fa-shopping-cart"></i>                   
                            </a>
                        </div>

                       <div class="link-item" style="padding:0px 15px 0px 0px;font-size: 2em;">
                            <a href="/help" class="header-autogestion-link" style="color:#444;">
                            <i class="fas fa-question"></i>                               
                            </a>
                        </div>
                     </div>
                </div>                
            </div>