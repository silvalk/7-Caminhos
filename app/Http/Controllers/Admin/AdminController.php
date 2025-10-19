<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Promocao;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



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
    $usuariosCount = User::count();
    $produtosCount = Produto::count();
    $feedbacksCount = Feedback::count();

    $pedidosPendentesCount = Pedido::where('status', 'pendente')->count();
    $pedidosCount = Pedido::count();

    $pedidosUltimos30DiasRaw = Pedido::selectRaw('DATE(created_at) as dia, COUNT(*) as total')
        ->where('created_at', '>=', now()->subDays(29)->startOfDay())
        ->groupBy('dia')
        ->orderBy('dia')
        ->get();

    $pedidosUltimos30Dias = [];
    for ($i = 0; $i < 30; $i++) {
        $date = now()->subDays(29 - $i);
        $key = $date->format('d/m');

        $registro = $pedidosUltimos30DiasRaw->firstWhere('dia', $date->toDateString());
        $pedidosUltimos30Dias[$key] = $registro ? $registro->total : 0;
    }

    return view('admin.dashboard', compact(
        'usuariosCount',
        'produtosCount',
        'feedbacksCount',
        'pedidosPendentesCount',
        'pedidosCount',
        'pedidosUltimos30Dias'
    ));
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
    $pedidos = Pedido::where('status', 'pendente')->orderBy('created_at', 'desc')->get();
    return view('admin.pedidos.index', compact('pedidos'));
}



    public function showPedido($id)
{
    $pedido = Pedido::findOrFail($id);
    return view('admin.pedidos.show_pedido', compact('pedido'));
}

public function concluirPedido($id)
{
    $pedido = Pedido::findOrFail($id);
    $pedido->status = 'concluido';
    $pedido->save();

    return redirect()->route('admin.pedidos')->with('success', 'Pedido concluído com sucesso.');
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

public function promocoes()
{
    $promocoes = Promocao::with('produto')->get();
    $produtos = Produto::all();

    return view('admin.promocoes.index', compact('promocoes', 'produtos'));
}

public function storePromocao(Request $request)
{
    $request->validate([
        'produto_id' => 'required|exists:produtos,id',
        'preco_promocional' => 'required|numeric|min:0',
    ]);

    Promocao::updateOrCreate(
        ['produto_id' => $request->produto_id],
        ['preco_promocional' => $request->preco_promocional]
    );

    return redirect()->route('admin.promocoes')->with('success', 'Promoção adicionada/atualizada com sucesso!');
}

public function destroyPromocao($id)
{
    Promocao::destroy($id);

    return redirect()->route('admin.promocoes')->with('success', 'Promoção removida com sucesso.');
}
}

