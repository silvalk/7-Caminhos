<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sete Caminhos - Meu Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite(['resources/js/home.js'])
    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffe9c8;
            padding-top: 90px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .container-user {
            max-width: 500px;
            width: 90%;
            background: #fff;
            border-radius: 10px;
            padding: 30px 25px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            color: #6D0202;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        h2 {
            font-family: Arial, serif;
            font-size: 32px;
            margin-bottom: 10px;
            color: #6D0202;
            text-align: center;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        .btn-save {
            background: #6D0202;
            color: #FFFAF3;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: opacity 0.3s ease;
            margin-top: 10px;
        }
        .btn-save:hover {
            opacity: 0.9;
        }

        .info-box {
            background: #f7e9d9;
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            box-shadow: inset 0 0 5px rgba(109, 2, 2, 0.2);
        }

    </style>
</head>
<body>
    @include('partials.header')

    <main class="container-user" role="main" aria-label="Perfil do usuário">
        @if(session('success'))
    <div style="background-color:#d4edda; color:#155724; border-radius:6px; padding:10px; margin-bottom:20px; text-align:center;">
        {{ session('success') }}
    </div>
@endif

        <h2>Meu Perfil</h2>
        <form method="POST" action="{{ route('user.updateName') }}">
            @csrf
            @method('PUT')
            <label for="name">Nome</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name', $userName ?? '') }}" 
                required 
                maxlength="50" 
                autocomplete="name"
            />
            @error('name')
                <p style="color:#e74c3c; margin-top:4px;">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn-save">Salvar</button>
        </form>

        <!-- Info pedidos pendentes -->
        <div class="info-box" role="region" aria-live="polite" aria-atomic="true">
            Pedidos Pendentes: <strong>{{ $pendingOrdersCount ?? 0 }}</strong>
        </div>

        <!-- Info total de compras -->
        <div class="info-box" role="region" aria-live="polite" aria-atomic="true">
            Total de Compras: <strong>{{ $totalPurchasesCount ?? 0 }}</strong>
        </div>
    </main>
</body>
</html>
