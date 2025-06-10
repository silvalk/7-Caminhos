<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Laravel!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            text-align: center;
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #FFCC00;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 20px;
            animation: bounce 1.5s infinite alternate;
        }

        p {
            font-size: 1.5rem;
            color: #fff;
            animation: pulse 3s infinite;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>LARAVEL INSTALADO POHAAAAA</h1>
        <p>Agora é só começar a construir sua aplicação incrível!</p>
    </div>
</body>
</html>
