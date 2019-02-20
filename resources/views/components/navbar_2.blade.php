<div class="nav2 container">
    <div class="header-nav2-itens ">
        <div class="links">
            <ul class="list-products">
                <li class="each-item">
                    <a href="/" class="ahref-circle">
                        <div class="button-circle-icon link-char">
                            {{-- <img src="{{asset('img/link-char.png')}}" alt=""> --}}
                        </div>
                        <span>@lang('home.Characters')</span>
                    </a>
                </li>                
                @if(auth::check() && auth::user()->group_id > 2)
                <li class="each-item">
                    <a href="/rares" class="ahref-circle">
                        <div class="button-circle-icon link-rare">
                            {{-- <img src="{{asset('img/link-rare.png')}}" alt=""> --}}
                            
                        </div>
                        <span>Raros</span>
                    </a>
                </li>
                <li class="each-item">
                    <a href="/tibiacoins" class="ahref-circle">
                        <div class="button-circle-icon link-tc">
                            {{-- <img src="{{asset('img/link-tc.png')}}" alt=""> --}}
                            
                        </div>
                        <span>Tibia Coins</span>                        
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>