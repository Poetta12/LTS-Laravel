<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Cart;
    use App\Models\PCart;
    use App\Models\Produits;

    class CartController extends Controller
    {
        public function index()
        {
            $carts = Cart::with('pCarts.produit')->get();
            return response()->json($carts);
        }

        public function show($id)
        {
            $cart = Cart::with('pCarts.produit')->findOrFail($id);
            return response()->json($cart);
        }

        public function store(Request $request)
        {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $cart = Cart::create([
                'user_id' => $request->get('user_id'),
            ]);

            return response()->json($cart);
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'ref' => 'required|integer',
            ]);

            $cart = Cart::findOrFail($id);
            $cart->ref = $request->get('ref');
            $cart->save();

            return response()->json($cart);
        }

        public function destroy($id)
        {
            $cart = Cart::findOrFail($id);
            $cart->delete();

            return response()->json(['message' => 'Panier supprimé avec succès']);
        }

        public function addProductToCart(Request $request)
        {
            $userId = $request->user()->id; // Récupérer l'ID de l'utilisateur authentifié
            $productId = $request->input('product_id'); // ID du produit à ajouter

            // Vérifier si un panier existe déjà pour cet utilisateur
            $cart = Cart::where('user_id', $userId)->first();

            if (!$cart) {
                // Créer un nouveau panier si aucun n'existe
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->save();
            }

            // Ajouter le produit au panier
            $existingProduct = PCart::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if ($existingProduct) {
                // Si le produit est déjà dans le panier, augmenter la quantité
                $existingProduct->quantity += 1;
                $existingProduct->save();
            } else {
                // Sinon, ajouter le produit au panier avec une quantité de 1
                $cartProduct = new PCart();
                $cartProduct->cart_id = $cart->id;
                $cartProduct->product_id = $productId;
                $cartProduct->quantity = 1;
                $cartProduct->save();
            }

            return response()->json(['message' => 'Produit ajouté au panier'], 200);
        }

        public function getCartItems(Request $request)
        {
            $user = $request->user();

            if (!$user) {
                return response()->json(['message' => 'Utilisateur non authentifié.'], 401);
            }

            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                return response()->json([]);
            }

            $items = $cart->pCarts()->with('produit')->get();

            return response()->json($items);
        }
    }
