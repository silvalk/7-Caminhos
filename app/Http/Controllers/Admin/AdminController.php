<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function usuarios()
{
    $usuarios = User::all();
    return view('admin.usuarios', compact('usuarios')); 
}


public function excluirUsuario($id)
{
    $usuario = User::findOrFail($id);
    $usuario->delete();

    return redirect()->route('admin.usuarios')->with('success', 'Usuário excluído com sucesso!');
}


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
            'categoria' => 'required|string|in:Cristais,Ervas,Miçangas,Velas,Kits,Imagens',
        ]);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->estoque = $request->estoque;
        $produto->descricao = $request->descricao;
        $produto->categoria = $request->categoria;

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

    if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
        Storage::disk('public')->delete($produto->imagem);
    }

    $produto->delete();

    return redirect()->route('admin.produtos')->with('success', 'Produto excluído com sucesso!');
}

    public function pedidos()
{
    $pedidos = Pedido::with('user')->latest()->get();

    return view('admin.pedidos', compact('pedidos'));
}

    public function showPedido($id)
{
    $pedido = Pedido::with('user')->findOrFail($id);
    return view('admin.show_pedido', compact('pedido'));
}

public function feedbacks()
{
    $feedbacks = Feedback::with('user')->get();
    return view('admin.feedbacks', compact('feedbacks'));
}

public function destroyFeedback($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->delete();

    return redirect()->route('admin.feedbacks')->with('success', 'Feedback excluído com sucesso.');
}

}

