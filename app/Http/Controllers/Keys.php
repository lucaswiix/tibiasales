<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;
use Auth;

class Keys extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::check()){
            return view('keys.donate');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function geraSenha($tamanho = 30, $maiusculas = false, $numeros = true, $simbolos = false)
        {
            $lmin = 'abcdefghijklmnopqrstuvwxyz';
            $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = '1234567890';
            $simb = '!@#$%*-';
            $retorno = '';
            $caracteres = '';
            $caracteres .= $lmin;
            if ($maiusculas) $caracteres .= $lmai;
            if ($numeros) $caracteres .= $num;
            if ($simbolos) $caracteres .= $simb;
            $len = strlen($caracteres);
            for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }

            return $retorno;            
        }

    public function store(Request $request)
    {
        if(auth::check()){
    if(is_numeric($request->input('usages')) && $request->input('usages') > 0){
        $key = new Keys;
        $usages = $request->input('usages');        
        $key->usages = $usages;
        $token = geraSenha();
        $randid = 1;
        $check = Keys::orderBy('id', 'DESC')->limit(1)->value('id');
        if(isset($check)){
            $randid = $check++;

        $key->token = "$token$usages$check";
        $key->user_id = $request->input('user_id');
        if($key->save()){
            return redirect()->back()->with('success', 'Token criado! e poderá ser usado '.$usages.' vezes');
        }
    }else{
        return redirect()->back()->with('erro', 'Usage inválido.')->withInput($request->all());
    }

    }else{
        return redirect('/login');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function show(Keys $keys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function edit(Keys $keys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keys $keys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keys $keys)
    {
        //
    }
}
