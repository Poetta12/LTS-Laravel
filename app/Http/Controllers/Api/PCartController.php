<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\PCart;

    class PCartController extends Controller
    {
        /**
         * Add a product to the cart.
         */
        public function store(Request $request)
        {
            $request->validate([
                'cart_id' => 'required|exists:cart,id',
                'produit_id' => 'required|exists:produits,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $existingProduct = PCart::where('cart_id', $request->cart_id)
                ->where('produit_id', $request->produit_id)
                ->first();

            if ($existingProduct) {
                $existingProduct->quantity += $request->quantity;
                $existingProduct->save();
            } else {
                $pcart = new PCart([
                    'cart_id' => $request->cart_id,
                    'produit_id' => $request->produit_id,
                    'quantity' => $request->quantity,
                ]);

                $pcart->save();
            }

            return response()->json(['message' => 'Produit ajouté au panier avec succès']);
        }
    }
