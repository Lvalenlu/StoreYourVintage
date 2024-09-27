<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Verificar autenticación de usuario en todas las acciones de este controlador
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar lista de productos con sus categorías, tamaños y colores relacionados
    public function index()
    {
        if ($user = Auth::user()->code == 0) {
            $categories = Category::all();
            $sizes      = Size::all();
            $colors     = Color::all();
            $products   = Product::with(['category', 'size', 'color', 'orders'])->get();
            return view('products.index', compact('products', 'sizes', 'colors', 'categories'));
        } else {
            // Si el código es inválido, cerrar sesión
            Auth::logout($user);
            return redirect('/');
        }
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Almacenar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // Validar datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required|string|max:50',
            'prices' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Crear y almacenar el producto en la base de datos
        Product::create([
            'name'              => $validatedData['name'],
            'description'       => $validatedData['description'],
            'image'             => '/productos.jpeg',
            'size'              => $validatedData['size'],
            'prices'            => $validatedData['prices'],
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar formulario de edición de un producto
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    // Actualizar los datos de un producto existente
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $oldProduct = Product::find($id);

        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($product->id),
            ],
            'description'   => 'required|string|max:1000',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'         => 'required|numeric|min:0',
            'size_id'       => 'required|string|exists:sizes,id',
            'color_id'      => 'required|string|exists:colors,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Verificar si hay nueva imagen cargada
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/images');
            $url = Storage::url($image);
            $validatedData['image'] = str_replace("http://localhost/storage/images", "", $url);
            $product->image = $url;
        }

        $product->update($validatedData);

        // Registrar auditoría de los cambios realizados en el producto
        $audits = new Audit();
        $audits->reason = $request->reason;
        $audits->type = 1;
        $audits->description = " Se actualiza el producto ID " .
        $product->id . ": <br> 1. " .
        $oldProduct->name . " = " . $product->name . " <br> 2. " .
        $oldProduct->description . " = " . $product->description . " <br> 3. " .
        $oldProduct->image . " = " . $product->image . " <br> 4. " .
        $oldProduct->price . " = " . $product->price . " <br> 5. " .
        $oldProduct->category->name . " = " . $product->category->name . " <br> 6. " .
        $oldProduct->size->name . " = " . $product->size->name . " <br> 7. " .
        $oldProduct->color->name . " = " . $product->color->name;
        $audits->users_id = Auth::id();
        $audits->save();

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar un producto si no tiene órdenes asociadas
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            if ($product->orders()->exists()) {
                return redirect()->route('products.index')
                    ->with('error', 'No se puede eliminar el producto porque tiene órdenes asociadas.');
            }
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
        } else {
            return redirect()->route('products.index')->with('error', 'El producto no fue encontrado.');
        }
    }

    // Filtrar productos según lo seleccionado por el usuario
    public function filterProducts(Request $request)
    {
        $filters = $request->all();
        $products = Product::query();

        $filters = app(Product::class)->apply($products, $filters);

        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = $products->get();

        return view('products.index', compact('products', 'sizes', 'colors', 'categories'));
    }
}
