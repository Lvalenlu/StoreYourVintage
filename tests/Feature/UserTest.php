<?php

use App\Models\User;
use Tests\TestCase;
use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;

class UserTest extends TestCase{
    

    public  function test_login(){

        // se utiliza para llamar a la funcion migrate
        Artisan::call('migrate'); 

        $carga =   $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Ingreso');

        $LoginTest = $this->post(route('login'),(["document"=>" 123456789","password"=>"123"]));
        $LoginTest->assertStatus(302)->assertRedirect(route('login'))->assertSessionHasErrors([]);

        $LoginTest = $this->post(route('login'),(["document"=>"1014658714","password"=>"Draco1234*"]));
        $LoginTest->assertStatus(302)->assertRedirect(route('login'))->assertSessionHasErrors([]);
    }

    public function test_register(){
        Artisan::call('migrate');
        $RegTest = $this->get(route('register'));
        $RegTest->assertStatus(200)->assertSee('Registro');

        $RegTest = $this->post('register',(
            ["name"=>"Laurita Valentina", 
             "email"=>"lvalun@gmail.com",
             "document"=>"1014658756", 
             "password"=>"1014658756",
             "charge"=>"", "code"=>"",
             "is_manager"=>"1"]));
        $RegTest->assertStatus(201)->assertRedirect(route('login'));
        //Para que esto funcione debemos loguearnos desde esta parte. 
    }


}