<?php

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase{
    
    public function test_changePassword()
    {
        $user = User::find(7);
        $this->actingAs($user);

        $carga = $this->get(route('changes.password'));
        $carga->assertStatus(200)->assertSee("Cambiar Contraseña");

        // Datos para cambiar la contraseña
        $data = [
            'current_password' => 'Abril123*', 
            'password' => 'Abril1234*',                 // Nueva contraseña
            'password_confirmation' => 'Abril1234*',    // Confirmación de la nueva contraseña
        ];


        $response = $this->put(route('change.password'), $data);
        $response->assertStatus(302)->assertRedirect(route('login'));

        // Verifica que la contraseña del usuario haya cambiado en la base de datos
        $this->assertTrue(Hash::check('Abril1234*', $user->fresh()->password));
    }
}
