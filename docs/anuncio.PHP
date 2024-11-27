<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "", "seu_banco_de_dados2");

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepara e insere os dados do imóvel na tabela
    $sql = "INSERT INTO imoveis (title, description, type, price, address, city, state) 
            VALUES ('$title', '$description', '$type', '$price', '$address', '$city', '$state')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id; // ID do imóvel inserido

        // Processar imagens
        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
            $total_files = count($_FILES['images']['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                $image_name = $_FILES['images']['name'][$i];
                $image_tmp_name = $_FILES['images']['tmp_name'][$i];
                $image_path = "uploads/" . $image_name;

                // Move a imagem para o diretório de uploads
                if (move_uploaded_file($image_tmp_name, $image_path)) {
                    // Inserir a imagem no banco de dados (opcional)
                    $sql_image = "INSERT INTO imagens (imovel_id, image_path) 
                                  VALUES ('$last_id', '$image_path')";
                    $conn->query($sql_image);
                }
            }
        }

        echo "Anúncio enviado com sucesso!";
    } else {
        echo "Erro ao enviar o anúncio: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
