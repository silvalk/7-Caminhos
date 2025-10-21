<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function finalizar()
    {
        // número do vendedor (coloque o seu número completo, sem +, espaços ou traços)
        $numero = '5515991440001';

        // Exemplo: obtendo itens do carrinho armazenado na sessão
        $itens = session('carrinho', []);

        $mensagem = "Olá! Gostaria de finalizar minha compra com os seguintes itens:\n\n";
        $total = 0;

        foreach ($itens as $item) {
            $mensagem .= "• {$item['nome']} (x{$item['quantidade']}) - R$" . number_format($item['preco'], 2, ',', '.') . "\n";
            $total += $item['preco'] * $item['quantidade'];
        }

        $mensagem .= "\nTotal: R$" . number_format($total, 2, ',', '.') . "\n\n";
        $mensagem .= "Por favor, confirme o pagamento e o envio 🙏";

        $url = "https://wa.me/{$numero}?text=" . urlencode($mensagem);

        return redirect()->away($url);
    }
}
