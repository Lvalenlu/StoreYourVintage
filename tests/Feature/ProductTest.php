<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{

    public function test_productUpdate(){
        $user = User::find(7); 
        $this->actingAs($user); 
        
        // Buscar un producto en la base de datos existente
        $product = Product::find(50);

        if (!$product) { // Valida si existe el producto o no
            $this->fail('No se encontró el producto');
        }

        // Datos para actualizar el producto
        $updatedProduct = [
            'name'          => 'Producto kaka',  
            'description'   => 'Descripción kaka',
            'price'         => 200,
            'category_id'   => (string) $product->category_id, 
            'size_id'       => (string) $product->size_id,        
            'color_id'      => (string) $product->color_id,  
            'reason'        => 'Actualización por prueba', // Razón para la auditoría
        ];

        // Realizar la petición de actualización
        $response = $this->put(route('products.update', $product->id), $updatedProduct);

        // Verificar que se redirige a la ruta correcta
        $response->assertRedirect(route('products.index'));

        // Verificar que el producto fue actualizado en la base de datos
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Producto kaka',
            'description' => 'Descripción kaka',
            'price' => 200,
        ]);

        // Verificar que se creó la auditoría con la descripción y la razón correctas
        $this->assertDatabaseHas('audits', [
            'reason' => 'Actualización por prueba',
            'type' => 1,
            'description' => " Se actualiza el producto ID " . $product->id . ": <br> 1. " .
                $product->name . " = Producto kaka <br> 2. " .
                $product->description . " = Descripción kaka <br> 3. " .
                $product->image . " = " . $product->image . " <br> 4. " .
                $product->price . " = 200 <br> 5. " .
                $product->category->name . " = " . $product->category->name . " <br> 6. " .
                $product->size->name . " = " . $product->size->name . " <br> 7. " .
                $product->color->name . " = " . $product->color->name,
            'users_id' => $user->id,
        ]);
    }



    public function test_productDel(){
        $user = User::find(7);  
        $this->actingAs($user);
        $product = Product::find(32);

        if ($product) { //valida si existe el producto o no
            $response = $this->delete(route('products.destroy', $product->id)); 
            // Verifica que la eliminación redirija a la ruta esperada
            $response->assertRedirect(route('products.index'));
            // Verifica que el producto ya no exista en la base de datos
            $this->assertDatabaseMissing('products', ['id' => $product->id]);
        }
    }
}
