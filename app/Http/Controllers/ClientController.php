<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $client = Clients::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(){
       return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $client = new Clients();
        $client->name = $request->name;
        $client->code = $request->code;
        $client->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Clients  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $client) {
      return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  CLients $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client){
      return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client) {
        $client->name = $request->name;
        $client->code = $request->code;
        $client->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Clients  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client){
       $client->delete();
    }
}
