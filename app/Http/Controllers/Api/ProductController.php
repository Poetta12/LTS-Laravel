<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Produits;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        public function index(): JsonResponse
        {
            $produits = Produits::all(); // Correction du nom de la classe
            return response()->json($produits);
        }

        public function showProduits(int $id): JsonResponse
        {
            $produit = Produits::findOrFail($id);
            if ($produit) {
                return response()->json($produit);
            }

            return response()->json(['message' => 'Product not found'], 404);
        }

        public function store(Request $request): JsonResponse
        {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string',
                'prix' => 'required|numeric',
                'quantite' => 'required|integer',
                'poid' => 'required|numeric',
                'categories_id' => 'required|integer|exists:categories,id',
            ]);

            $product = Produits::create($validatedData);

            return response()->json($product, 201);
        }

        public function update(Request $request, $id): JsonResponse
        {
            $validatedData = $request->validate([
                'nom' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'prix' => 'sometimes|required|numeric',
                'quantite' => 'sometimes|required|integer',
                'poid' => 'sometimes|required|numeric',
                'categories_id' => 'sometimes|required|integer|exists:categories,id',
            ]);

            $product = Produits::findOrFail($id);
            $product->update($validatedData);

            return response()->json($product);
        }

        public function destroy($id): JsonResponse
        {
            $product = Produits::findOrFail($id);
            $product->delete();

            return response()->json(['message' => 'Product deleted successfully'], 204);
        }

    }
