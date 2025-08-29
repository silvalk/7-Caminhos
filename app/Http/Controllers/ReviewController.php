<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|string|max:500',
    ]);

    $existing = Review::where('user_id', Auth::id())->first();
    if ($existing) {
        return back()->with('error', 'Você já enviou uma avaliação.');
    }

    Review::create([
        'user_id' => Auth::id(),
        'name' => Auth::user()->email,
        'rating' => $request->rating,
        'review' => $request->review,
    ]);

    return redirect()->back()->with('success', 'Avaliação enviada com sucesso!');
}

}
