<?php

namespace App\Http\Controllers;

use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Character;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     function index()
    {

    	$chars['chars'] = Character::where('active', 1)
        ->where('delete', 0)
        ->where('sold', 0)
        ->orderBy('created_at', 'DESC')
        ->paginate(4);

        $world = file_get_contents('js/api-worlds.js');
        $worlds = json_decode($world, true);
        $num = count($worlds['worlds']['allworlds']);

        $w = $worlds['worlds']['allworlds'];


        Character::where('active', 1)
        ->where( 'active_days', '<=', Carbon::now())
        ->update(['active' => 0]);

        return view('index', ['num' => $num, 'w' => $w])->with($chars);
    }

    function loadWorlds(){
        $world = file_get_contents('js/api-worlds.js');
        $worlds = json_decode($world, true);
        $num = count($worlds['worlds']['allworlds']);

        $w = $worlds['worlds']['allworlds'];

        $output = '';

        for ($i=0; $i < $num; $i++) { 
            $output .= '<option value="'.$w[$i]['name'].'">'.$w[$i]['name'].'</option>';
        }

        return response($output);
    }

     function loadAjax(Request $request)
    {

       $chars = Character::where('active', 1)->orderBY('created_at', 'DESC')->paginate(4);
        return view('index')->with($chars);
    }


}
