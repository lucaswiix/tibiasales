<?php

namespace App\Http\Controllers;

use App\Models\Rares;
use Illuminate\Http\Request;

class RaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('errors.404');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rares  $rares
     * @return \Illuminate\Http\Response
     */
    public function show(Rares $rares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rares  $rares
     * @return \Illuminate\Http\Response
     */
    public function edit(Rares $rares)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rares  $rares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rares $rares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rares  $rares
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rares $rares)
    {
        //
    }
}
