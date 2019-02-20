<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Auth;
use DB;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;

class CharactersController extends Controller
{
    private $users;

    public function __construct(User $users){
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chars['chars'] = Character::where('active', 1)
        ->where('delete', null)
        ->where('sold', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(8);

        $world = file_get_contents('js/api-worlds.js');
        $worlds = json_decode($world, true);
        $num = count($worlds['worlds']['allworlds']);

        $w = $worlds['worlds']['allworlds'];

        return view('index')->with($chars)->with('w', $w)->with('num',$num);
    }

    public function find(request $request)
    {
        $get = file_get_contents('https://api.tibiadata.com/v2/characters/'.$request->char.'.json');
        $data = json_decode($get,true);

        if(isset($data['characters']['data']['world'])){

        $search_world = file_get_contents('https://api.tibiadata.com/v2/world/'.$data['characters']['data']['world'].'.json');
        $world = json_decode($search_world,true);

        $world = [
            'world_type' => $world['world']['world_information']['pvp_type']
        ];
        array_push($data['characters']['data'], $world);

        }


       return response()->json($data);
        
    }


    /**
     * Busca uma quantidade.
     *
     * @return \Illuminate\Http\Response
     */
    public function findchar(request $request)
    {
         $char = Character::where('active', true);

        if($request->input('world') != 'all'){
            $char->where('world', '=', $request->input('world'));
        }

        if(is_numeric($request->input('min_lvl')) && $request->input('min_lvl') > 0){
            $char->where('level', '>', $request->input('min_lvl'));
        }

        if(is_numeric($request->input('max_lvl')) && $request->input('max_lvl') > 0){
            $char->where('level', '<', $request->input('max_lvl'));
        }
    
        $vocations = [];
        if($request->input('ek') == 1)
            array_push($vocations, 'Elite Knight', 'Knight');

        if($request->input('rp') == 1)
            array_push($vocations, 'Royal Paladin', 'Paladin');           

        if($request->input('ed') == 1)
            array_push($vocations, 'Elder Druid', 'Druid');

        if($request->input('ms') == 1)
            array_push($vocations, 'Master Sorcerer', 'Sorcerer');

        if(count($vocations) > 0)
        $char->whereIn('vocation', $vocations);

        $pvptype = [];
        if($request->input('npvp') == 1)
            array_push($pvptype, 'Optional PvP');

        if($request->input('opvp') == 1)
            array_push($pvptype, 'Open PvP');

        if($request->input('retroopen') == 1)
            array_push($pvptype, 'Retro Open PvP');

        if($request->input('retrohardcore') == 1)
            array_push($pvptype, 'Retro Hardcore PvP');

        if($request->input('hpvp') == 1)
            array_push($pvptype, 'Hardcore PvP');

        if(count($pvptype) > 0)
            $char->whereIn('world_type', $pvptype);

            switch ($request->input('orderby')) {
            case 'Mais Recente':
                $char->orderBy('created_at', 'DESC');
                break;
            case 'Mais Antigo':
               $char->orderBy('created_at', 'ASC');
                break;
            case 'Menor Preço':
               $char->orderBy('price', 'ASC');
                break;
             case 'Maior Preço':
                $char->orderBy('price', 'DESC');
                break;
            case 'Menor Level':
                $char->orderBy('level', 'ASC');
                break;
            case 'Maior Level':
                $char->orderBy('level', 'DESC');
                break;
            
            default:
                 $char->orderBy('created_at', 'DESC');
                break;
        }
       $char->where('delete', null);
       $char->where('sold', 0);

       $chars['chars'] = $char->paginate(8);
       // $chars['chars'] = $charsx;

       //Basic

        $world = file_get_contents('js/api-worlds.js');
        $worlds = json_decode($world, true);
        $num = count($worlds['worlds']['allworlds']);

        $w = $worlds['worlds']['allworlds'];

       // return view('index', ['num' => $num, 'w' => $w])->with($chars);

        // return $request->all();
        return view('index', ['num' => $num, 'w' => $w])->with($chars)->withInput($request->flash());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth::check()){
        $nome = str_replace(" ","+",$request->input('name'));
        $get = file_get_contents('https://api.tibiadata.com/v2/characters/'.$nome.'.json');
        $data = json_decode($get,true);
        $info = $data['characters']['data'];

        if(isset($data['characters']['error'])){
            $errors[] = 'O nome do personagem não foi encontrado ou não existe.';
            return back()->with(['errors' => 'Preço invalido']);
            // return back()->with($errors);
            // return redirect()->back()->with($errors);
        }elseif(!is_numeric($request->input('price'))){
            $errors[] = 'O preço deve ser apenas numeros. ex: R$ 1200.';          
            

            return back()->with(['errors' => 'Preço invalido']);

        }else{

        $search_world = file_get_contents('https://api.tibiadata.com/v2/world/'.$info['world'].'.json');
        $world = json_decode($search_world,true);
        $world_type = $world['world']['world_information']['pvp_type'];


    if($request->input('distance') != NULL)
        if(!is_numeric($request->input('magiclevel')) || $request->input('magiclevel') > 135)
            return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Magic Level.');

    if($request->input('distance') != NULL)
        if(!is_numeric($request->input('shielding')) || $request->input('shielding') > 130)
            return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Shielding.');



        $selected = Character::where('user_id', '=', auth::user()->id)
        ->where('name', '=', $request->input('name'))
        ->where('permission', 0)
        ->get();

        if(count($selected) > 0)
            return redirect()->back()->with('error', 'Este personagem já foi postado. Ative-o o post.');
        

        $char = new Character;

        if($request->input('accept_coins') != NULL && $request->input('accept_coins') == 1){
            if($request->input('tibiacoins') == NULL || !is_numeric($request->input('tibiacoins')) || $request->input('tibiacoins') > 200000){
                return redirect()->back()->with('error', 'O valor de TibiaCoins é inválido ou não existe.');
            }else{
                $char->accept_tc = 1;
                $char->price_tc = $request->input('tibiacoins');
            }
        }

        $char->name = $request->input('name');
        $char->magicLevel = $request->input('magiclevel');
        $char->shielding = $request->input('shielding') ? $request->input('shielding') : 0;

        if($request->input('moeda') == NULL){
            $char->moeda = 'R$';
        }else{
        switch ($request->input('moeda')) {
            case 'R$':
                $char->moeda = $request->input('moeda');
                break;
                case 'U$':
                $char->moeda = $request->input('moeda');
                break;
                case 'MXN':
                $char->moeda = $request->input('moeda');
                break;            
            default:
                $char->moeda = 'R$';
                break;
            }
         }

        if($info['vocation'] == 'Royal Paladin' || $info['vocation'] == 'Paladin'){

        if($request->input('distance') != NULL)
            if(!is_numeric($request->input('distance')) || $request->input('distance') > 140)
                return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Distance Fight.');

            $char->distance_fight = $request->input('distance');        
        }elseif($info['vocation'] == 'Elite Knight' || $info['vocation'] == 'Knight')

        if($request->input('axe') != NULL)
            if(!is_numeric($request->input('axe')) || $request->input('axe') > 135)
                return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Axe Fight.');

        if($request->input('sword') != NULL)
             if(!is_numeric($request->input('sword')) || $request->input('sword') > 135 )
                return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Sword Fight.');

        if($request->input('club') != NULL)            
            if(!is_numeric($request->input('club')) || $request->input('axe') > 135)
                return redirect()->back()->with('error', 'Coloque valores verdadeiros no campo Club Fight.');

            $char->axe_fight = $request->input('axe') ? $request->input('axe') : 0;
            $char->sword_fight = $request->input('sword')  ? $request->input('sword') : 0;
            $char->club_fight = $request->input('club')  ? $request->input('club') : 0;
        }

        $char->world = $info['world'];
        $char->level = $info['level'];
        $char->vocation = $info['vocation'];
        $char->sex = $info['sex'];
        $char->world_type = $world_type;

        $current = Carbon::now();
        $char->active_days = $current->addDays(1);

        if(isset($info['former_world']))
        $char->transfer = 'Transfer Express';
        else
        $char->transfer = 'Transfer Normal';

        $char->mage_hat = $request->input('magehat') ? $request->input('magehat') : 0;
        $char->elementalist_addon_2 = $request->input('elemental2') ? $request->input('elemental2') : 0;
        $char->neon_sparkid_mount = $request->input('neonsparkid') ? $request->input('neonsparkid') : 0;

        $char->hide_name = $request->input('hidenick') ? $request->input('hidenick') : 0;
        $char->hide_world = $request->input('hideworld') ? $request->input('hideworld') : 0;


        $char->price = $request->input('price');
        $char->description = $request->input('description');

        $voc1 = str_replace(" ","-",$info['vocation']);
        $voc = strtolower($voc1);

        $wtype1 = str_replace(" ","-",$world_type);
        $wtype = strtolower($wtype1);

        $autoid = 1; 
        $lastid = Character::OrderBy('id', 'DESC')->limit(1)->value('id');
        if(isset($lastid))
            $autoid = $lastid++;

        $url = $voc.'-'.$info['level'].'-'.$wtype.'-'.$autoid;
        
        $checkurl = Character::where('url', '=', $url)->orderBy('created_at', 'DESC')->get();
        $newid = $autoid+1;
        if(count($checkurl) > 0)
            $url = $voc.'-'.$info['level'].'-'.$wtype.'-'.$newid;

        $char->url =  $url;

        
            $char->user_id = auth::user()->id;
            $char->save();
        $getcharid = Character::where([
            'permission' => 0,
            'user_id' => auth::user()->id,
        ]
        )->orderBy('created_at', 'DESC')->limit(1)->value('id');
        return redirect()->back()->with('charname', $request->input('name'))->with('charid', $getcharid);
        }else{
            return redirect('/login')->with('error', 'É necessário estar logado para fazer um anuncio.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $check = Character::where('url', '=', $url)->get();
        if(count($check) == 1)
        {
            $chars = Character::where('active', 1)
            ->where('url', '=', $url)
            ->where('delete', null)
            ->where('sold', 0)
            ->limit(1)
            ->get();


            foreach ($chars as $char) {
                $ads = Character::where('active', 1)
            ->where('url', '!=', $url)
            ->where('delete', null)
            ->where('sold', 0)
            ->where('vocation', '=', $char->vocation)
            ->orderBy('created_at', 'ASC')
            ->limit(7)
            ->get();                

            }
                     
                if(count($ads) < 7){
                    $ads = Character::where('active', 1)
                        ->where('url', '!=', $url)
                        ->where('delete', null)
                        ->where('sold', 0)
                        ->orderBy('created_at', 'ASC')
                        ->limit(7)
                        ->get();
                }       



            

            if(count($chars) > 0)
            {
                return view('chars.show', compact('chars', 'ads'));
            }else{
                return view('chars.show');
            }

        }else{
            return view('chars.show_404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('price') == NULL || !is_numeric($request->input('price')) || $request->input('price') > 50000)
            return redirect()->back()->with('error', 'O valor inserido é incorreto ou não existe.');


       $update = Character::where('id', $id)
       ->where('user_id', '=', auth::user()->id)
       ->update(['price' => $request->input('price')]);

       if($update)        
    return redirect()->back()->with('success', 'O anuncio foi alterado com sucesso!');
        else
            return redirect()->back()->with('error', 'OPS! Aconteceu algum erro, tenta novamente mais tarde.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth::check()){
        $check = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)->get();

        $del_days = Carbon::now()->addDays(15);

        if(count($check) > 0){
          $del = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->update(['delete' => $del_days]);
        if($del){
            return redirect()->back()->with('success', ' Anúncio deletado com sucesso.');
            }
        }else{
            return redirect('/control-panel')->with('erro', 'Este anuncio não foi encontrado.');
        }

            }else{
        
        return redirect('/login')->withErrors('Erro', 'Você não esta logado para fazer isto.');
            }
    }

       public function restore($id)
    {
        if(auth::check()){
        $check = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->where('delete', '>=', Carbon::now())
        ->get();
        if(count($check) > 0){
          $restore = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->where('delete', '>=', Carbon::now())
        ->update(['delete' => null]);
        if($restore){
            return redirect()->back()->with('success', 'Anúncio restaurado com sucesso.');
            }
        }else{
            return redirect('/control-panel')->with('error', 'Este anuncio não foi encontrado.');
        }
            }else{        
        return redirect('/login')->with('error', 'Você não esta logado para fazer isto.');
            }
    }

    public function setSold($id){
        if(auth::check()){
        $check = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)->get();
        if(count($check) > 0){
          $sold = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->update(['sold' => 1]);
        if($sold){
            return redirect()->back()->with('success', 'O anuncio foi setado como vendido.');
            }
        }else{
            return redirect('/control-panel')->withErrors('erro', 'Este anuncio não foi encontrado.');
        }

            }else{
        
        return redirect('/login')->withErrors('Erro', 'Você não esta logado para fazer isto.');
        
    }
    }

    public function setUnSold($id){
      if(auth::check()){
        $check = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->where('sold', 1)
        ->get();
        if(count($check) > 0){
          $sold = Character::where('id', '=', $id)
        ->where('user_id', '=', auth::user()->id)
        ->update(['sold' => 0]);
        if($sold){
            return redirect()->back()->with('success', ' O anuncio foi setado como não vendido.');
            }
        }else{
            return redirect('/control-panel')->withErrors('erro', 'Este anuncio não foi encontrado.');
        }

            }else{
        
        return redirect('/login')->withErrors('Erro', 'Você não esta logado para fazer isto.');        
                }
    }

    // DONATES
    
    public function indexDonate(){
            return view('panel.donate.create');
    }

    function showDonate($id){
        $chars = Character::where('id','=', $id)
        ->where('delete', null)
        ->where('sold', 0)
        ->get();
        if(count($chars) > 0){
            return view('panel.donate.create', compact('chars'));
        }else{
            return view('panel.donate.create');
        }
    }


    function confirmDonate(request $request){
        
    if($request->input('confirm') == NULL || $request->input('confirm') != 1)
        return redirect()->back()->with('error', 'Se nem você confirma que transferiu, imagina a gente 🤷‍♂️');

    if($request->input('charid') == NULL)
        return redirect()->back()->with('error', 'ID do char inválido. Tente novamente');

    $find = Character::where('id', '=', $request->input('charid'))->get();

    if(count($find) == 0)
        return redirect()->back()->with('error', 'ID do char não existe. Tente novamente'); 

    if(!is_numeric($request->input('pacote')) || $request->input('pacote') == NULL || $request->input('pacote') > 2 || $request->input('pacote') == 0)
        return redirect()->back()->with('error', 'Selecione o pacote desejado, corretamente.');   

    $name = Character::where('id', '=', $request->input('charid'))->value('name');

    $user_id = Character::where('id', '=', $request->input('charid'))->value('user_id');

    if($user_id != auth::user()->id)
        return redirect()->back()->with('error', 'Apenas o dono do anuncio pode ativa-lo.');

    $last_request = Character::where('id', '=', $request->input('charid'))->value('last_request');

    $carbon_date = Carbon::parse($last_request);

    if($last_request != NULL && $carbon_date->gt(Carbon::now()))
        return redirect('/control-panel')->with('error', 'Voce enviou uma confirmação a pouco tempo. Libera '.Carbon::parse($last_request)->diffForHumans());

    $now = Carbon::now();
    $uplr = Character::where('id', $request->input('charid'))
    ->where('user_id', '=', auth::user()->id)
    ->update(['last_request' => $now->addHour(3)]);

            $fore = DB::table('users')->where('group_id', '>', 2)->get();
            $admins = [];

            foreach ($fore as $for) {
                array_push($admins, $for->id);
            }

        $nick = DB::table('users')->where('id', '=', $user_id)->value('nick');

        switch ($request->input('pacote')) {
            case '1':
                $pacote = 50;
                break;
            case '2':
                $pacote = 100;
                break;            
            default:
                $pacote = $request->input('pacote');
                break;
        }

       $message = '['.$nick.'][ID:  '.$request->input('charid').'] Transferi '.$pacote.' coins aparti de '.$name;

       $thread = Thread::create([
            'subject' => 'Confirmar Coins',
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $message,
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        // Recipients
            $thread->addParticipant($admins);
       
       
        return redirect('/control-panel')->with('success', 'O seu pedido foi enviado, e em no maximo 6 horas confirmaremos sua doação.');   
    }

    public function testing(){
        $now = Carbon::now();
        return 'Agora:'.$now.'+ 3 horas'.$now->addHour(3);
    }
}
