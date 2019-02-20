<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
$localePreferences = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
if(is_array($localePreferences) && count($localePreferences) > 0) {
       $browserLocale = $localePreferences[0];
       
       if(Session::get('locale') == null)
            \Session::put('locale', $browserLocale);
    }
    }

Route::get('/', 'Controller@index');

route::get('/politica-de-privacidade', function(){
    $msg = 'SEÇÃO 1 - O QUE FAREMOS COM ESTA INFORMAÇÃO?
Quando você realiza alguma transação com nossa loja, como parte do processo de compra e venda, coletamos as informações pessoais que você nos dá tais como: nome, e-mail e endereço.

Quando você acessa nosso site, também recebemos automaticamente o protocolo de internet do seu computador, endereço de IP, a fim de obter informações que nos ajudam a aprender sobre seu navegador e sistema operacional.

Email Marketing será realizado apenas caso você permita. Nestes emails você poderá receber notícia sobre nossa loja, novos produtos e outras atualizações.

SEÇÃO 2 - CONSENTIMENTO
Como vocês obtêm meu consentimento?

Quando você fornece informações pessoais como nome, telefone e endereço, para completar: uma transação, verificar seu cartão de crédito, fazer um pedido, providenciar uma entrega ou retornar uma compra. Após a realização de ações entendemos que você está de acordo com a coleta de dados para serem utilizados pela nossa empresa.

Se pedimos por suas informações pessoais por uma razão secundária, como marketing, vamos lhe pedir diretamente por seu consentimento, ou lhe fornecer a oportunidade de dizer não.

E caso você queira retirar seu consentimento, como proceder?

Se após você nos fornecer seus dados, você mudar de ideia, você pode retirar o seu consentimento para que possamos entrar em contato, para a coleção de dados contínua, uso ou divulgação de suas informações, a qualquer momento, entrando em contato conosco em contato@tibiasales.com ou nos enviando uma correspondência em: TibiaSales Rua Cicero dias da cruz, 71

SEÇÃO 3 - DIVULGAÇÃO
Podemos divulgar suas informações pessoais caso sejamos obrigados pela lei para fazê-lo ou se você violar nossos Termos de Serviço.

SEÇÃO 4 - SERVIÇOS DE TERCEIROS
No geral, os fornecedores terceirizados usados por nós irão apenas coletar, usar e divulgar suas informações na medida do necessário para permitir que eles realizem os serviços que eles nos fornecem.

Entretanto, certos fornecedores de serviços terceirizados, tais como gateways de pagamento e outros processadores de transação de pagamento, têm suas próprias políticas de privacidade com respeito à informação que somos obrigados a fornecer para eles de suas transações relacionadas com compras.

Para esses fornecedores, recomendamos que você leia suas políticas de privacidade para que você possa entender a maneira na qual suas informações pessoais serão usadas por esses fornecedores.

Em particular, lembre-se que certos fornecedores podem ser localizados em ou possuir instalações que são localizadas em jurisdições diferentes que você ou nós. Assim, se você quer continuar com uma transação que envolve os serviços de um fornecedor de serviço terceirizado, então suas informações podem tornar-se sujeitas às leis da(s) jurisdição(ões) nas quais o fornecedor de serviço ou suas instalações estão localizados.

Como um exemplo, se você está localizado no Canadá e sua transação é processada por um gateway de pagamento localizado nos Estados Unidos, então suas informações pessoais usadas para completar aquela transação podem estar sujeitas a divulgação sob a legislação dos Estados Unidos, incluindo o Ato Patriota.

Uma vez que você deixe o site da nossa loja ou seja redirecionado para um aplicativo ou site de terceiros, você não será mais regido por essa Política de Privacidade ou pelos Termos de Serviço do nosso site.

Links

Quando você clica em links na nossa loja, eles podem lhe direcionar para fora do nosso site. Não somos responsáveis pelas práticas de privacidade de outros sites e lhe incentivamos a ler as declarações de privacidade deles.

SEÇÃO 5 - SEGURANÇA
Para proteger suas informações pessoais, tomamos precauções razoáveis e seguimos as melhores práticas da indústria para nos certificar que elas não serão perdidas inadequadamente, usurpadas, acessadas, divulgadas, alteradas ou destruídas.

Se você nos fornecer as suas informações de cartão de crédito, essa informação é criptografada usando tecnologia "secure socket layer" (SSL) e armazenada com uma criptografia AES-256. Embora nenhum método de transmissão pela Internet ou armazenamento eletrônico é 100% seguro, nós seguimos todos os requisitos da PCI-DSS e implementamos padrões adicionais geralmente aceitos pela indústria.

SEÇÃO 6 - ALTERAÇÕES PARA ESSA POLÍTICA DE PRIVACIDADE
Reservamos o direito de modificar essa política de privacidade a qualquer momento, então por favor, revise-a com frequência. Alterações e esclarecimentos vão surtir efeito imediatamente após sua publicação no site. Se fizermos alterações de materiais para essa política, iremos notificá-lo aqui que eles foram atualizados, para que você tenha ciência sobre quais informações coletamos, como as usamos, e sob que circunstâncias, se alguma, usamos e/ou divulgamos elas.

Se nossa loja for adquirida ou fundida com outra empresa, suas informações podem ser transferidas para os novos proprietários para que possamos continuar a vender produtos para você.';

    
    return $msg;

});

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/api/americanas', 'Controller@americanas');
Route::get('/americanas', function(){
    return view('zezinho.index');
});

Route::get('/terms', function(){
	return view('terms');
});
Route::get('help', function(){
	return view('help');
});


Route::get('/sales', function() {
	return view('sales');
});
Route::get('/sellchar', function(){
	return view('sell_char'); 
})->middleware(['auth']);

Route::get('/acess_keys', function(){
	return view('acess_keys'); 
});
Route::get('/special_keys', function(){
	return view('special_keys'); 
});


route::get('/search', 'CharactersController@findchar')->name('searchchar');

route::get('/sellchar/find/', 'CharactersController@find')->name('findchar');

route::get('/load/worlds', 'Controller@loadWorlds')->name('loadworlds');
route::get('/char/{url}', 'CharactersController@show');


route::get('/home', function(){
	return redirect('/control-panel');
});

route::get('/characters/del/{id}', 'CharactersController@destroy');

route::get('/characters/restore/{id}', 'CharactersController@restore');


route::get('/characters/sold/{id}', 'CharactersController@setSold');

route::get('/characters/unsold/{id}', 'CharactersController@setUnSold');



route::post('/characters/confirm', 'Controller@sentCoins')->name('sentcoins');

// API 
Route::resource('/characters', 'CharactersController');
Route::resource('/rares', 'RaresController');
Route::resource('/tibiacoins', 'CoinController');

Route::group(['prefix' => 'donate'], function () {

Route::get('/', 'CharactersController@indexDonate')->name('panel');
Route::get('/{id}', 'CharactersController@showDonate');
route::Post('/confirm', 'CharactersController@confirmDonate')->name('confirmDonate');


});

Auth::routes();

Route::group(['prefix' => 'control-panel'], function () {

Route::get('/', 'HomeController@index')->name('panel');
Route::get('/rep', 'HomeController@rep')->name('rep');
Route::get('/perfil', 'HomeController@perfil')->name('perfil');
Route::get('/trash', 'HomeController@trash')->name('trash');

Route::group(['prefix' => 'admin'], function () {

Route::get('/', 'HomeController@admin')->name('admin');
Route::post('/add-permission', 'HomeController@addPermission')->name('addPermission');
Route::post('/ativar-anuncio', 'HomeController@ativaranuncio')->name('admin');

Route::post('/deletar-anuncio', 'HomeController@deletarAnuncio')->name('delAnuncioAdmin');
});


Route::get('/change-password','HomeController@showChangePasswordForm');

Route::post('/change/password','HomeController@changePassword')->name('changePassword');

Route::post('/change/contact','HomeController@changeContact')->name('changeContact');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('/intermediate', 'MessagesController@intermediate');
    Route::post('/interested', 'MessagesController@interested');    
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});



});






Route::get('/user/{nick}', 'UsersController@show')->name('ShowUser');


