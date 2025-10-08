<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Feedback;
use App\Models\User;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login_admin');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['msg' => 'Email ou senha inválidos']);
    }

    public function dashboard()
    {
        $produtos = Produto::count();
        $pedidos = Pedido::count();
        $usuarios = User::count();
        $feedbacks = Feedback::count();

        return view('admin.dashboard', compact('produtos', 'pedidos', 'usuarios', 'feedbacks'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function produtos()
    {
        $produtos = Produto::all();
        return view('admin.produtos', compact('produtos'));
    }

    public function createProduto()
    {
        return view('admin.create_produto');
    }
    public function storeProduto(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            $produto->imagem = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->save();

        return redirect()->route('admin.produtos')->with('success', 'Produto adicionado com sucesso!');
    }

    public function editProduto($id)
    {
        $produto = Produto::findOrFail($id);
        return view('admin.edit_produto', compact('produto'));
    }

    public function updateProduto(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            $produto->imagem = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->save();

        return redirect()->route('admin.produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroyProduto($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('admin.produtos')->with('success', 'Produto excluído com sucesso!');
    }
}
