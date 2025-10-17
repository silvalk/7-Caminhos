<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class CartController extends Controller
{
    public function showCart()
    {
        return view('cart');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'produtos' => 'required|array|min:1',
            'subtotal' => 'required|numeric',
            'frete' => 'required|numeric',
            'total' => 'required|numeric',
            'cep' => 'required|string',
        ]);

        $pedido = Pedido::create([
            'produtos' => $request->produtos,
            'subtotal' => $request->subtotal,
            'frete' => $request->frete,
            'total' => $request->total,
            'cep' => $request->cep,
        ]);

        return response()->json(['success' => true, 'pedido_id' => $pedido->id]);
    }
}

