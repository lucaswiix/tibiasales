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
        ->where('delete', 0)
        ->OrderBy('created_at', 'DESC')
        ->paginate(8);
        return view('panel.index')->with($ads);
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
        $user->facebook = $request->input('whatsapp');
        $user->whatsapp = $request->input('facebook');

        if($user->save())
            return redirect()->back()->with('success', 'O seus meios de contatos foram atualizados com sucesso.');
        else
            return redirect()->back()->with('error', 'Aconteceu algum erro, tente novamente mais tarde.');

    }
    
    public function perfil()
    {
        
        return view('panel.perfil');
    }

    public function admin(){

        if(auth::user()->group_id > 2){
        $threads = Thread::getAllLatest()->get();

        $users = User::where('id', '!=', auth::user()->id)->get();
        $chars = DB::table('characters')->orderBy('created_at', 'DESC')->get();

        $charsoff = DB::table('characters')
        ->where('permission', 0)
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('panel.admin', compact('users', 'chars', 'threads', 'charsoff'));
    }else{
        return redirect('/');
    }

    }

        public function ativaranuncio(request $request){
            
            if(auth::user()->group_id > 2){

                if($request->input('pacote') == null || $request->input('pacote') > 2 || $request->input('pacote') == 0 || !is_numeric($request->input('pacote')))
                    return redirect()->back()->with('error', 'O pacote é inválido.');

                $pacote = $request->input('pacote');

                if($pacote == '1')
                $active_days = Carbon::now()->addDays(15);

                if($pacote == '2')
                $active_days = Carbon::now()->addDays(30);

                $update = Character::where('id', '=', $request->input('charid'))->update(['active_days' => $active_days, 'permission' => 1, 'active' => 1]);
                if($update){
                    return redirect()->back()->with('success', 'Anuncio '.$request->input('charid').'Ativo com sucesso.');
                }else{
                    return redirect()->back()->withErrors('Erro', 'Aconteceu algum erro.');
                }
            }else{
                return redirect('/');
            }
    
    }

}
