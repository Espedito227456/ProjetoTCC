<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Criação de Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos básicos para o layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .google-btn {
            background-color: #dd4b39;
            margin-top: 10px;
            position: relative;
        }

        .google-btn:hover {
            background-color: #c23321;
        }

        .google-btn i {
            position: absolute;
            left: 10px;
            font-size: 20px;
        }

        .toggle-link {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }

        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Formulário de Login -->
    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit" class="btn">Entrar</button>
            <!-- Link para login com Google -->
            <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=85601593943-rd8j0r3irr420a8o3md3kh1j0e103fv1.apps.googleusercontent.com&redirect_uri=http://localhost/ProjetoTCC/callback.php&scope=email%20profile&access_type=online" class="btn google-btn">
                <i class="fab fa-google"></i>
                Entrar com Google
            </a>
        </form>
        <a href="#" class="toggle-link" onclick="toggleForm()">Criar uma conta</a>
    </div>

    <!-- Formulário de Criação de Conta (inicialmente oculto) -->
    <div class="container" style="display: none;">
        <h2>Criar Conta</h2>
        <form action="/register" method="post">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit" class="btn">Criar Conta</button>
            <!-- Link para criação de conta com Google -->
            <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=85601593943-rd8j0r3irr420a8o3md3kh1j0e103fv1.apps.googleusercontent.com&redirect_uri=http://localhost/ProjetoTCC/callback.php&scope=email%20profile&access_type=online" class="btn google-btn">
                <i class="fab fa-google"></i>
                Criar com Google
            </a>
        </form>
        <a href="#" class="toggle-link" onclick="toggleForm()">Já tem uma conta? Entrar</a>
    </div>

    <script>
        function toggleForm() {
            const loginForm = document.querySelectorAll('.container')[0];
            const registerForm = document.querySelectorAll('.container')[1];
            loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
            registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>