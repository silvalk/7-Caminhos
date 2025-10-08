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

    public function products()
{
    $produtos = \App\Models\Produto::all();
    return view('products', compact('produtos'));
}

}
