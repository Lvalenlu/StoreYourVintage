<?php

use Tests\TestCase;
use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;

class UserTest extends TestCase{

    public  function test_register(){

        Artisan::call('migrate');

        $carga =   $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Ingreso');


        $LoginTest = $this->post(route('login'),(["document"=>" 123456789","password"=>"123"]));
        $LoginTest->assertStatus(302)->assertRedirect(route('login'))->assertSessionHasErrors([]);
    }

}
