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
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\returnValue;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $sizes      = Size::all();
        $colors     = Color::all();
        $products   = Product::with(['category', 'size', 'color', 'orders'])->get();
        return view('products.index', compact('products', 'sizes', 'colors', 'categories'));
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
            'name'              => $validatedData['name'],
            'description'       => $validatedData['description'],
            'image'             => '/productos.jpeg',
            'size'              => $validatedData['size'],
            'prices'            => $validatedData['prices'],
            // 'publicationDate'   => $validatedData['publicationDate'],
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
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }



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

        $product->category_id   = $request->input('id_categories');
        $product->size_id       = $request->input('size_id');
        $product->color_id      = $request->input('color_id');

        $product->update($validatedData);



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
        $audits->id_users = Auth::id();
        $audits->save();

        // Volver a la pagina de los productos
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }


    public function destroya($id)
    {
        $user = Product::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
        } else {
            // Envia un mensaje de error si no se encontró el producto
            return redirect()->route('products.index')->with('error', 'El producto no fue encontrado.');
        }

    }

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
