<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::all();
      return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /*  old fashion of validating 
   
   public function store(Request $request)
    {
      $client = new Client();
      $client->name = $request->name;
      $client->code = $request->code;
      $client->save();
    }
*/


    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
   /* old way to validate 

    public function show(Client $client)
    {
      return view('clients.show', compact('client'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    { 
    $timeEntry = Client::create($request->validated());
    }
    public function edit(Client $client)
    {
      return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
   // public function update(Request $request, Client $client)
    //{
   //   $client->name = $request->name;
    //  $client->code = $request->code;
     // $client->save();
   // }
   public function update(ClientRequest $request, Client $client)
   {
       $client->update($request->validated());
   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $client->delete();
    }
}
