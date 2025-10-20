<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProductController extends Controller
{
    public function validateProducts(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer',
        ]);

        $products = Product::whereIn('id', $request->ids)
            ->where('active', true) 
            ->get();

        return response()->json($products);
    }
}
