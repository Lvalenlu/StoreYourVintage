<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\returnValue;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        // Validar los datos ingresados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string|max:1000',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required|string|max:50',
            'prices' => 'required|numeric|min:0',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);

        // Crear el nuevo producto
        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => '/productos.jpeg',
            'size' => $validatedData['size'],
            'prices' => $validatedData['prices'],
            'id_categories' => $validatedData['id_categories'],
        ]);

        // Retornar respuesta o redirección
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('products.edit', compact('product', 'categories'));
    }


    
    public function update(Request $request, $id)
    {
        // Validar los datos del producto
        $product = Product::find($id);
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($product->id),
            ],
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'nullable|string|max:50',
            'prices' => 'required|numeric|min:0',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);

        // Actualizar los datos del producto
        $product->update($validatedData);

        // Retornar respuesta o redirección
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }


    public function destroy(Product $product)
    {

    }
}
