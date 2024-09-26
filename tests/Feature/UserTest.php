<?php

use App\Models\User;
use Tests\TestCase;
use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase{

    public function test_database_connection()
    {
        $user = DB::connection()->getPdo();
        $this->assertNotNull($user, 'La conexión a la base de datos falló.');
    }

    public function test_login(){
        // se utiliza para llamar a la funcion migrate
        Artisan::call('migrate'); 

        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Ingreso');
    }

    public function test_loginValid(){        
        // Crea un usuario válido       
        // $user = User::factory()->create([    
        //     "name"     =>"SITVEMNMSDAFAS Ventina", 
        //     "email"    =>"bernal0755@gmail.com",
        //     'document' => '1014658715',            
        //     'password' => bcrypt('Abril124*'), 
        //     "charge"   =>"gerente", 
        //     "code"     =>"0",
        //     "is_manager"=>"1"       
        // ]);            
        
        // Intenta iniciar sesión con los datos válidos        
        $response = $this->post('/login', 
        [            
            'document' => '1044458714',            
            'password' => 'Abril123*',        
        ]);      
        // $this->assertTrue(Auth::check());
        $response->assertRedirect('/home');   $this->assertAuthenticated();
    }

    
    public function test_loginFail(){    
        // Intenta iniciar sesión con credenciales inválidas. Valida la autentificaión               
        $response = $this->post('/login', [            
            'codument' => 'invalid@example.com',            
            'password' => 'wrong_password',       
        ]);        
        $response->assertStatus(302);        
        $this->assertGuest();    
        $this->assertFalse(Auth::check());
    }
} 