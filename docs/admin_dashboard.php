<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/admin_dashboard.css">
</head>
<body>
<header>
        <div class="logo">
            <a href="index.html">
                <img src="Imagens/logo-localizaLar-semFundo.png" alt="Logo LocalizaLar">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Início</a></li>
                <li><a href="calcfinanciamento.html">Calculadora de Financiamento</a></li>
                <li><a href="anuncio.html">Anuncie seu imovel</a></li>
                <li><a href="contato.html">Contate um Corretor</a></li>
            </ul>
            <div class="corretor-btn">
                <a href="admin.html">
                    <img src="Imagens/pasta.png" alt="Corretor">
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Lista de Imóveis</h1>
        <?php
        // Defina as credenciais de conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "seu_banco_de_dados2";

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Realizar a consulta para buscar os dados
        $sql = "SELECT id, title, description, type, price, address, city, state FROM imoveis";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["title"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td>" . $row["type"] . "</td>
                        <td>R$ " . number_format($row["price"], 2, ',', '.') . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["state"] . "</td>
                    </tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum imóvel encontrado.</p>";
        }

        $sql = "SELECT * FROM contatos"; // Certifique-se de que a tabela 'contatos' existe no banco
        $result = $conn->query($sql);
        
        // Verificar se a consulta retorna resultados
        if ($result && $result->num_rows > 0) {
            // Exibir os dados
            while ($row = $result->fetch_assoc()) {
                // Exemplo de exibição dos dados
                echo "ID: " . $row["id"] . " - Nome: " . $row["name"] . " - Mensagem: " . $row["message"] . "<br>";
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fechar a conexão
        $conn->close();
        ?>
        <button onclick="window.location.href='index.html'">Voltar para o Início</button>
    </div>
</body>
</html>
