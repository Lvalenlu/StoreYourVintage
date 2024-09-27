<?php

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EditTest extends TestCase{
    
    public function test_changePassword()
    {
        $user = User::find(7);
        $this->actingAs($user);

        $carga = $this->get(route('changes.password'));
        $carga->assertStatus(200)->assertSee("Cambiar Contraseña");

        // Datos para cambiar la contraseña
        $data = [
            'current_password'      => 'Abril123*', 
            'password'              => 'Abril1234*',          
            'password_confirmation' => 'Abril1234*',  
        ];


        $response = $this->put(route('change.password'), $data);
        $response->assertStatus(302)->assertRedirect(route('login'));

        // Verifica que la contraseña del usuario haya cambiado en la base de datos
        $this->assertTrue(Hash::check('Abril1234*', $user->fresh()->password));
    }

    public function test_editInfo(){
        $user = User::find(7);
        $this->actingAs($user);

        $load = $this->get(route('profile'));
        $load->assertStatus(200)->assertSee('Información');

        $data = [
            'name'      => 'Andres  Guzman', 
            'document'  => '1044458714',                
            'email'     => 'abril07562@gmail.com',  
            'charge'    =>  'el mejor de la tierra para laura'  
        ];

        // Realizar la petición de actualización
        $response = $this->put(route('users.update', $user->id), $data);

        // Verificar que se redirige a la ruta correcta
        $response->assertRedirect(route('profile'));

        // Verificar que el producto fue actualizado en la base de datos
        $this->assertDatabaseHas('users', [
            'id'        => $user->id,
            'name'      => 'Andres  Guzman',
            'email'     => 'abril07562@gmail.com'
        ]);

    }
}
