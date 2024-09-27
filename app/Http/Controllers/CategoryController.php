<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // Verificar que el usuario esté autenticado antes de acceder a las acciones del controlador
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar la lista de categorías.
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Mostrar el formulario para crear una nueva categoría.

    public function create()
    {
        return view('categories.create');
    }

    // Guardar una nueva categoría en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    // Mostrar el formulario para editar una categoría existente.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Actualizar una categoría existente en la base de datos.
    public function update(Request $request, Category $category)
    {
        // Validar los datos, ignorando la categoría actual para evitar conflictos de nombre
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($category->id),
            ],
        ]);
        $category->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }
}
