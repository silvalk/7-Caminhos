<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promocao;
use App\Models\Produto;

class AdminPromocaoController extends Controller
{
    public function index()
{
    $promocoes = Promocao::with('produto')->get();
    return view('admin.promocoes.index', compact('promocoes'));
}

    public function create()
    {
        $produtos = Produto::all();
        return view('admin.promocoes.create', compact('produtos'));
    }

    public function store(Request $request)
{

    $request->validate([
        'produto_id' => 'required|exists:produtos,id',
        'preco_promocional' => 'required|numeric|min:0',
    ]);

    Promocao::create([
        'produto_id' => $request->produto_id,
        'preco_promocional' => $request->preco_promocional,
    ]);

    return redirect()->route('admin.promocoes.index')->with('success', 'Promoção criada com sucesso!');
}


    public function edit($id)
    {
        $promocao = Promocao::findOrFail($id);
        $produtos = Produto::all();

        return view('admin.promocoes.edit', compact('promocao', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'preco_promocional' => 'required|numeric|min:0',
            'ativo' => 'required|boolean',
        ]);

        $promocao = Promocao::findOrFail($id);
        $promocao->update($request->all());

        return redirect()->route('admin.promocoes.index')->with('success', 'Promoção atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $promocao = Promocao::findOrFail($id);
        $promocao->delete();

        return redirect()->route('admin.promocoes.index')->with('success', 'Promoção removida com sucesso!');
    }
}
