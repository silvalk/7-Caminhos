<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Promocao;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        $promocoes = Promocao::with('produto')->get();

        return view('home', compact('reviews', 'promocoes'));
    }

    public function products(Request $request)
{
    $selectedProductId = $request->input('selected', null);

    $categorias = $request->input('categorias', []);
    $preco = $request->input('preco');

    $query = \App\Models\Produto::with('promocao');  // carregando promoções junto

    if (!empty($categorias)) {
        $query->whereIn('categoria', $categorias);
    }

    if ($preco) {
        if ($preco === 'ate100') {
            $query->where('preco', '<=', 100);
        } elseif ($preco === '100a200') {
            $query->whereBetween('preco', [100, 200]);
        } elseif ($preco === 'acima200') {
            $query->where('preco', '>', 200);
        }
    }

    $produtos = $query->paginate(10)->withQueryString();

    // Agora também pegamos o preço promocional
    $produtosArray = $produtos->map(function ($produto) {
        return [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'preco_promocional' => $produto->promocao ? $produto->promocao->preco_promocional : null, 
            'descricao' => $produto->descricao,
            'imagem' => $produto->imagem ? '/storage/'.$produto->imagem : '/storage/default.jpg',
        ];
    })->values()->toArray();

    return view('products', compact('produtos', 'produtosArray', 'selectedProductId'));
}




}
