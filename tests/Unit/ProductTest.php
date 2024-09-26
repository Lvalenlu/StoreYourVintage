<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{

    /** @test */
    public function it_can_update_a_product_in_existing_database()
    {
        $user = User::first();  // Encuentra el primer usuario disponible


        // Autenticar al usuario
        $this->actingAs($user);

        // Buscar un producto en la base de datos existente
        $product = Product::first(); // Asegúrate de tener algún producto en la BD

        // Datos para actualizar el producto
        $updatedData = [
            'name' => 'Producto Actualizado',
            'description' => 'Descripción actualizada',
            'price' => 150,
            'category_id' => $product->category_id,
            'size_id' => (int)$product->size_id,
            'color_id' => (int)$product->color_id,
        ];

        // Realizar la petición de actualización
        $response = $this->put(route('products.update', $product->id), $updatedData);

        // Verificar que se redirige a la ruta correcta
        $response->assertRedirect(route('products.index'));

        // Verificar que el producto fue actualizado en la base de datos
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Producto Actualizado',
            'description' => 'Descripción actualizada',
            'price' => 150,
        ]);
    }
}
