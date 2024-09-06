<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {
        public function index()
        {
            $categories = Category::all();
            return response()->json($categories);
        }

        public function show($id)
        {
            // Récupère la catégorie par ID
            $category = Category::findOrFail($id);

            // Accède aux produits de la catégorie
            $products = $category->products;

            // Retourne la catégorie et ses produits
            return response()->json([
                'category' => $category,
                'products' => $products
            ]);
        }

        public function create(Request $request)
        {
            // Valide les données d'entrée
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Crée une nouvelle catégorie
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return response()->json($category, 201);
        }

        public function update(Request $request, $id)
        {
            // Trouve la catégorie par ID
            $category = Category::findOrFail($id);

            // Valide les données d'entrée
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Met à jour la catégorie
            $category->name = $request->name;
            $category->save();

            return response()->json($category);
        }

        public function delete($id)
        {
            // Trouve la catégorie par ID
            $category = Category::findOrFail($id);

            // Supprime la catégorie
            $category->delete();

            return response()->json(['message' => 'Category deleted successfully']);
        }
    }
