	<div class="nav2 container">
		<?php $url = explode('/', $_SERVER["REQUEST_URI"]);
		if(!isset($url[2])) $url[2] = ''; ?>
		<div class="header-nav2-itens">
			<span class="header">Minha Conta <small style="font-size:0.5em;">ou <a href="/">voltar para o site</a></small></span>
			<div class="links-href" style="">
				<ul style="">
					<li class="{{($url[2] == '') ? 'active' : ''}}">
						<a href="/control-panel">Meus Anúncios</a>
					</li>
					<li class="spaceleft {{($url[2] == 'messages') ? 'active' : ''}}">
						<a href="/control-panel/messages">Mensagens</a>
					</li>
					@if(auth::user()->group_id > 2)
					<li class="spaceleft {{($url[2] == 'rep') ? 'active' : ''}}">
						<a href="/control-panel/rep">Reputação</a>
					</li>
					@endif
					<li class="spaceleft {{($url[2] == 'perfil') ? 'active' : ''}}">
						<a href="/control-panel/perfil">Perfil</a>
					</li>
					@if(auth::user()->group_id > 2)
					<li class="spaceleft {{($url[2] == 'admin') ? 'active' : ''}}">
						<a href="/control-panel/admin">Admin</a>
					</li>
					@endif
					<li class="spaceleft ">
						<form id="logout-form" action="{{ route('logout') }}" method="POST">
							{{ csrf_field() }}
							<button type="submit" style="border:0;background-color: transparent;cursor: pointer;color:#444;" onclick="return confirm('Tem certeza que deseja sair?');">Sair</button>
                                  
                        
                    </form>
					</li>
				</ul>
			</div>
		</div>
	</div>