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

use function PHPUnit\Framework\returnValue;

class ProductController extends Controller
{
    // Verificar autenticación de usuario
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar lista de productos con categorías, tamaños y colores
    public function index()
    {
        $categories = Category::all();
        $sizes      = Size::all();
        $colors     = Color::all();
        $products   = Product::with(['category', 'size', 'color', 'orders'])->get();
        return view('products.index', compact('products', 'sizes', 'colors', 'categories'));
    }

    // Crear un nuevo producto
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Agregar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required|string|max:50',
            'prices' => 'required|numeric|min:0',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);

        // Crear el nuevo producto
        Product::create([
            'name'              => $validatedData['name'],
            'description'       => $validatedData['description'],
            'image'             => '/productos.jpeg',
            'size'              => $validatedData['size'],
            'prices'            => $validatedData['prices'],
            'publicationDate'   => $validatedData['publicationDate'],
            'id_categories' => $validatedData['id_categories'],
        ]);

        // Retornar respuesta o redirección
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }


    public function show(Product $product)
    {
        //
    }

    // Editar un producto
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    // Actualizar datos de un producto
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $oldProduct =$product;

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
            'color_id'      => 'required|string|exists:sizes,id',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);
        // return $request;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/images');
            $url = Storage::url($image);
            $validatedData['image'] = str_replace("http://localhost/storage/images", "", $url);
            $product->image      = $url;
        }
        $product->category_id   = $request->input('id_categories');
        $product->size_id       = $request->input('size_id');
        $product->color_id      = $request->input('color_id');
        // return $product;
        $product->update($validatedData);

        // Registrar auditoría de cambios
        $audits = new Audit();
        $audits->reason = $request->reason;
        $audits->type = 1;
        $audits->description = "
        Se actualiza el producto de ID: $product->id en los valores:
        $oldProduct->name = $product->name
        $oldProduct->description = $product->description
        $oldProduct->image = $product->image
        $oldProduct->price = $product->price
        ";
        $audits->reason = "";
        $audits->users_id = Auth::id();
        $audits->save();

        // Volver a la pagina de los productos
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar un producto si no tiene órdenes asociadas
    public function destroy($id){
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
