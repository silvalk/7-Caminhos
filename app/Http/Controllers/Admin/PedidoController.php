<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function concluirPedido($id)
{
    $pedido = Pedido::find($id);

    if(!$pedido) {
        return redirect()->back()->with('error', 'Pedido não encontrado.');
    }

    if($pedido->status === 'pendente') {
        $pedido->status = 'concluido';
        $pedido->save();

        return redirect()->back()->with('success', 'Pedido marcado como concluído.');
    }

    return redirect()->back()->with('error', 'Pedido não pode ser concluído.');
}

}
