<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function userProfile()
{
    $user = auth()->user();

    $pendingOrdersCount = $user->pedidos()->where('status', 'pendente')->count();
    $totalPurchasesCount = $user->pedidos()->count();

    return view('user.profile', compact('user', 'pendingOrdersCount', 'totalPurchasesCount'));
}

    public function show()
    {
        $user = Auth::user();
        $pendingOrdersCount = $user->pedidos()->where('status', 'pendente')->count();
        $totalPurchasesCount = $user->pedidos()->count();

        return view('user', [
            'userName' => $user->name,
            'pendingOrdersCount' => $pendingOrdersCount,
            'totalPurchasesCount' => $totalPurchasesCount,
        ]);
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Nome atualizado com sucesso!');
    }
}
