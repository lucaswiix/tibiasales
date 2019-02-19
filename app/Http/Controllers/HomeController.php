<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use App\Models\Character;
use App\User;
use Carbon\Carbon;
use DB;
use Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads['ads'] =  Character::where('user_id', auth::user()->id)
        ->where('delete', null)
        ->OrderBy('created_at', 'DESC')
        ->paginate(8);

        $dels['dels'] = Character::where('user_id', auth::user()->id)
        ->where('delete', '>', Carbon::now())
        ->OrderBy('created_at', 'DESC')
        ->get();

        return view('panel.index')->with($ads)->with($dels);
    }

    public function trash(){        
        $ads = Character::where('user_id', '=', auth::user()->id)
        ->where('delete', '>', Carbon::now())
        ->orderBy('created_at', 'DESC')
        ->paginate(8);

        return view('panel.trash', compact('ads'));
    }

    public function loadMsgs(request $request){
 
    }

    function showChangePasswordForm(){
      return view('panel.change-password');
    }

    public function changePassword(request $request){

if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $this->validate(request(), [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function changeContact(request $request){

        $user = auth::user();
        $user->facebook = $request->input('facebook');
        $user->whatsapp = $request->input('whatsapp');

        if($user->save())
            return redirect()->back()->with('success', 'O seus meios de contatos foram atualizados com sucesso.');
        else
            return redirect()->back()->with('error', 'Aconteceu algum erro, tente novamente mais tarde.');

    }
    
    public function perfil()
    {
        $search = Character::where('user_id', '=', auth::user()->id)
        ->where('delete', null)
        ->where('permission', 1)        
        ->get();

        if(auth::user()->group_id > 2)
            $user = 'Administrador';
        elseif(count($search) > 0)
            $user = 'Anunciante';
        else
            $user = 'Usuário';


        return view('panel.perfil', ['cargo' => $user]);
    }

    public function admin(){

        if(auth::user()->group_id > 2){
        $threads = Thread::getAllLatest()->get();

        $users = User::where('id', '!=', auth::user()->id)->get();


        $chars = DB::table('characters')
        ->where('delete', null)
        ->orderBy('created_at', 'DESC')->get();

        $charsoff = DB::table('characters')
        ->where('permission', 0)
        ->orderBy('created_at', 'DESC')
        ->get();

        $anund = DB::table('characters')
        ->where('delete', '>=', Carbon::now())
        ->orderBy('delete', 'DESC')
        ->get();

        $anunall = DB::table('characters')
        ->where('delete', null)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('panel.admin', compact('users', 'chars', 'threads', 'charsoff', 'anund', 'anunall'));
             }else{
         return redirect('/');
         }

    }

    public function addPermission(request $request)
    {
        if(auth::user()->group_id > 2){
        if($request->input('userid') == null || !is_numeric($request->input('userid')) || $request->input('userid') == 1)
            return redirect()->back()->with('error', 'O usuário deve ser preenchido.');

        if($request->input('cargo') == null || !is_numeric($request->input('cargo')) || $request->input('cargo') > 1)
            return redirect()->back()->with('error', 'O cargo do usuário é inválido ou não foi preenchido.');

        $geting = User::where('id', '=', $request->input('userid'))->value('nick');

        $upuser = User::where('id', '=', $request->input('userid'))
        ->first()
        ->update(['group_id' => $request->input('cargo')]);


        if($upuser)
            return redirect()->back()->with('success', 'Foi adicionado o cargo ao usuário '.$geting.' com sucesso.');
        else
            return redirect()->back()->with('error', 'Aconteceu algum erro.');

    }else{
        return redirect('/control-panel');
    }


    }

        public function ativaranuncio(request $request){
            
            if(auth::user()->group_id > 2){

                if($request->input('pacote') == null || $request->input('pacote') > 2 || $request->input('pacote') == 0 || !is_numeric($request->input('pacote')))
                    return redirect()->back()->with('error', 'O pacote é inválido.');

                $pacote = $request->input('pacote');

                $premium = 0;

                if($pacote == '1'){
                $active_days = Carbon::now()->addDays(15);
                $premium = 0;
                }


                if($pacote == '2'){
                $active_days = Carbon::now()->addDays(30);
                $premium = 1;
            }


                $update = Character::where('id', '=', $request->input('charid'))->update(['active_days' => $active_days, 'permission' => 1, 'active' => 1, 'premium' => $premium]);
                if($update){
                    return redirect()->back()->with('success', 'Anuncio '.$request->input('charid').'Ativo com sucesso.');
                }else{
                    return redirect()->back()->withErrors('Erro', 'Aconteceu algum erro.');
                }
            }else{
                return redirect('/control-panel');
            }
    
    }

    function deletarAnuncio(request $request)
    {
        if($request->input('anuncioid') == null || !is_numeric($request->input('anuncioid')))
            return redirect()->back()->with('error', 'Delete incorreto!');


        if(auth::user()->group_id == 4){
            $del = Character::where('id', '=', $request->input('anuncioid'))
            ->where('delete', '>=', Carbon::now())
            ->delete();

            if($del)
                return redirect()->back()->with('success', 'Anuncio deletado com sucesso.');
            else
                    return redirect()->back()->with('error', 'Aconteceu algum erro...');
            
        }elseif(auth::user()->group_id == 5){

             $del = Character::where('id', '=', $request->input('anuncioid'))
                ->delete();

                if($del)
                return redirect()->back()->with('success', 'Anuncio deletado com sucesso.');
                else
                    return redirect()->back()->with('error', 'Aconteceu algum erro...');

        }else{
            return redirect('/control-panel');
        }

    }

}
