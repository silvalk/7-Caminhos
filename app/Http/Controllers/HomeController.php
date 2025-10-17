<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('home', compact('reviews'));
    }

    public function products(Request $request)
{

    $categorias = $request->input('categorias', []);
    $preco = $request->input('preco');

    $query = \App\Models\Produto::query();

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

    return view('products', compact('produtos'));
}


}
