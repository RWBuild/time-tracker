<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_create_a_client(){
        // $this->withoutExceptionHandling();
        $response = $this->post('/clients', [
            'name' => 'ABC company',
            'code'=> 'ABCC'
        ]);

        $response->assertStatus(200);   
        $this->assertTrue(Client::all()->count() == 1);

    }
// //update test
public function test_user_can_update_a_client()
{
    // $this->withoutExceptionHandling();
    
    $client = Client::factory(['name'=>'ABC company'])->create();
    $this->assertDatabaseHas('clients',['name'=>'ABC Company']);

    $response = $this->put('/clients/'.$client->id, [
        'name' => 'ABC company updated',
        'code'=>$client->code
    ]);
    $response->assertStatus(200);
    $this->assertDatabaseHas('clients', ['name'=>'ABC company updated']);

    //  dd($client->name);

    // dd($client);
}
//TODO: ADD TEST UPDATE
//TODO: check Refresh not working 
//show test
public function test_user_can_see_a_client()
{   
    // $this->withoutExceptionHandling();
    $client = Client::factory()->create();
    $response = $this->get('/clients/'.$client->id);
    $response ->assertStatus(200);
    $response ->assertSee($client->name);
}
//delete
public function test_user_can_delete_a_client()
{
    $client = Client::factory()->create();
    // ---------------------------------------------------------------
    // TODO: This is messy code
    // Client::all()->count() is the only count you need to check
    // there's no reason to add the count to an array and then check the count through the array
    // doing so is dangerous. We want to check the record count before and after the delete attempt
    // putting it in a variable is not needed.
    $array_count=[];
    $array_count[0]=Client::all()->count(); 
    $this->assertTrue(Client::all()->count() == $array_count[0]);
    var_dump($array_count[0]);
    // why the var dump?
    // ---------------------------------------------------------------

    // $this->assertTrue(Client::all()->count() > 0);
    $this->delete('/clients/'.$client->id);
    $array_count[0]= Client::all()->count();
    var_dump($array_count[0]);
    
    // this is not a good assertion. You should be testing the record count NOT an array.
    // this test should check against the number 0.
    $this->assertTrue(Client::all()->count() == $array_count[0]);
 
}
}
