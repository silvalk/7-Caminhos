<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
    ]);

    if (!auth()->check()) {
        return redirect()->back()->withErrors('Você precisa estar logado para enviar feedback.');
    }

    Feedback::create([
        'user_id' => auth()->id(),
        'name' => auth()->user()->name,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Feedback enviado com sucesso!');
}

}
