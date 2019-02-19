@extends('layouts.default')
@section('navbar')
<nav class="navbar">
	@include('components/navbar_1')
</nav>
@endsection
@section('main_content')
<div class="container" style="margin-top: 4em;">
	<div class="col-md-8 bg-white" style="border:solid 1px #ccc;border-radius: 4px;padding:20px;">
		<h3>Termos e regras TibiaSales</h3>
		<br>
		<br>
		<small>O TibiaSales é um aplicativo desenvolvido diretamente para ajudar na divulgação de anúncios em geral. <br>
			O TibiaSales não tem nenhum meio de venda ou fins lucrativos, todos as <b>doações</b> são voluntários e sem obrigação.<br>
			O TibiaSales não se envolve em nenhuma negociação entre o anunciante e comprador.<br>
			O TibiaSales não tem nenhum envolvimento na perda ou ganho de qualquer item ou valor gerado a partir do anúncio.<br>
			Oferecemos dias de anúncios e destaques como gratificação pela doação realizada pelo usuário.<br><br>

			<h3> Regras </h3>
			Publique anuncios apenas de sua autoria.<br>
			O TibiaSales não tem nenhum interesse em nenhum dado cadastrado, mas vale resaltar que após o cadastro os dados guardados no nosso banco de dados passam a ser <b>resevadamente do tibisales.</b><br>

			As mensagens privadas entre os usuários são monitoradas, evitando e punindo os participantes no qual demostre: Racismo, Preconceito, Nudez, Violencia, Tentativa de Enganar ou outros, parcial ao jugamento dos nossos moderadores.<br>

			Todas as regras estão mediante a mudança a qualquer hora sem aviso prévio.
			
			<br><br>	
			<div class="clearfix"></div>

			<a href="/sales">
			<button class="btngreen">Eu concordo</button>
			</a>






		</small>

		

	</div>
	
</div>
@endsection
