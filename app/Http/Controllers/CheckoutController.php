<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   public function finalizar(Request $request)
{
    if (!auth()->check()) {
        return response()->json(['erro' => 'Usuário não logado'], 401);
    }

    $itens = $request->input('cart', []);
    if (empty($itens)) {
        return response()->json(['erro' => 'Carrinho vazio'], 400);
    }

    $numero = '5515991440001';

    // Mensagem inicial amigável
    $mensagem = "Olá! 👋\n";
    $mensagem .= "Espero que você esteja bem!\n";
    $mensagem .= "Gostaria de finalizar minha compra com os seguintes itens:\n\n";

    $total = 0;

    foreach ($itens as $item) {
        $subtotal = $item['preco'] * $item['quantidade'];
        $mensagem .= "• {$item['nome']}\n";
        $mensagem .= "  Quantidade: {$item['quantidade']}\n";
        $mensagem .= "  Preço unitário: R$ " . number_format($item['preco'], 2, ',', '.') . "\n";
        $mensagem .= "  Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "\n\n";
        $total += $subtotal;
    }

    $mensagem .= "💰 Total: R$ " . number_format($total, 2, ',', '.') . "\n\n";
    $mensagem .= "Por favor, confirme o pagamento e o envio. Muito obrigado! 🙏";

    $mensagem = preg_replace('/[^\x20-\x7EÀ-ÿ\n\p{L}\p{N}\p{P}]/u', '', $mensagem);

    $url = "https://wa.me/{$numero}?text=" . rawurlencode($mensagem);

    return response()->json(['url' => $url]);
}





}
