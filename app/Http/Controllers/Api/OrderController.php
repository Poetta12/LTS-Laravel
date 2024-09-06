<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order as Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Fonction pour montrer les différentes commandes
     */
    public function index()
    {
        $orders = Order::all();

        return $orders;
    }

    public function create(Request $request): Order
    {
        $request->validate([
            'lastname_id' => 'required',
            'name_id' => 'required',
            'address_id' => 'required',
            'zipcode_id' => 'required',
            'town_id' => 'required',
            'email_id' => 'required',
            'phone_id' => 'required',
            'productname_id' => 'required',
            'productprice_id' => 'required',
            'productquantity_id' => 'required',
        ]);
        $order = new Order();
        $order->lastname_id = $request->lastname_id;
        $order->name_id = $request->name_id;
        $order->address_id = $request->address_id;
        $order->zipcode_id = $request->zipcode_id;
        $order->town_id = $request->town_id;
        $order->email_id = $request->email_id;
        $order->phone_id = $request->phone_id;
        $order->productname_id = $request->productname_id;
        $order->productprice_id = $request->productprice_id;
        $order->productquantity_id = $request->productquantity_id;

        return $order;
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function update(Request $request, Order $order, $id): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'lastname_id' => 'required',
            'name_id' => 'required',
            'address_id' => 'required',
            'zipcode_id' => 'required',
            'town_id' => 'required',
            'email_id' => 'required',
            'phone_id' => 'required',
            'productname_id' => 'required',
            'productprice_id' => 'required',
            'productquantity_id' => 'required',

        ]);
        $order = Order::findOrFail($id);
        $order->lastname_id = $request->lastname_id;
        $order->name_id = $request->name_id;
        $order->address_id = $request->address_id;
        $order->zipcode_id = $request->zipcode_id;
        $order->town_id = $request->town_id;
        $order->email_id = $request->email_id;
        $order->phone_id = $request->phone_id;
        $order->productname_id = $request->productname_id;
        $order->productprice_id = $request->productprice_id;
        $order->productquantity_id = $request->productquantity_id;

        return response()->json(['message' => 'Commande mise a jour !']);
    }

    public function destroy(Order $order, $id)
    {
        $order = Order::findOrfail($id);
        $order->delete();

        return response()->json(['message' => 'Commande supprimée avec succès !']);
    }
}
