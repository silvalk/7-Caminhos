<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;

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
    public function validateProducts(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json([]);
        }

        $produtos = Produto::whereIn('id', $ids)->get();

        $produtos = $produtos->map(function ($produto) {
            return [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'imagem' => $produto->imagem ? Storage::url($produto->imagem) : '/storage/default.jpg',
                'descricao' => $produto->descricao,
                'categoria' => $produto->categoria,
            ];
        });

        return response()->json($produtos);
    }
}


