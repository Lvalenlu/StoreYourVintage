<?php

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CustomerTest extends TestCase{

    public function test_customer() {
        $user = User::find(7); 
        $this->actingAs($user);
    
        // Carga la vista de clientes
        $cargas = $this->get(route('customers.index'));
        $cargas->assertStatus(200)->assertSee('Email');
        $customer = Customer::find(1);
    
        if (!$customer) {
            $this->fail('No se encontró el cliente');
        }

        // Realiza la petición de eliminación (que en tu controlador cambia el estado)
        $response = $this->delete(route('customers.destroy', $customer->id, $customer->status = 1), $data= ['reason' => 'aaa']);
        $response->assertRedirect(route('customers.index'));


        // Verificar status cuando cambia a 1
        $this->assertEquals(1, $customer->status, 'El estado del cliente no cambió correctamente.');
    
        // Verificar la auditoria
        $this->assertDatabaseHas('audits', [
            'reason' => 'aaa',
            'type' => 2,
            'description' => 'Se activó al usuario #' . $customer->id . '<br> Nombre: ' . $customer->name . ' ' . $customer->lastName . '<br> Documento: ' . $customer->document,
            'users_id' => $user->id,
        ]);
    }
}
