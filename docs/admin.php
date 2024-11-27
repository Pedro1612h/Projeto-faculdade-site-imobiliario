<?php
session_start();

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $seu_banco_de_dados2);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Processo de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Verifica se o usuário e senha estão corretos (este é um exemplo simples, você pode melhorar com hash de senha)
    if ($user === 'admin' && $pass === 'senha123') {
        $_SESSION['loggedin'] = true;
        header("Location: admin_dashboard.php"); // Redireciona para a página de administração
        exit();
    } else {
        $login_error = "Usuário ou senha inválidos!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html">
                <img src="Imagens/logo-localizaLar-semFundo.png" alt="Logo LocalizaLar">
            </a>
        </div>
    </header>

    <main>
        <section class="contact-form">
            <h1>Login de Administrador</h1>
            <?php if (isset($login_error)) { echo "<p style='color: red;'>$login_error</p>"; } ?>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label for="username">Usuário:</label>
                    <input type="text" id="username" name="username" required placeholder="Digite o nome de usuário">
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required placeholder="Digite a senha">
                </div>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>
