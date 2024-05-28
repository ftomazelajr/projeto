<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="imprimir-notinha.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <h3>Selecione os produtos e insira a quantidade:</h3>
        <?php
        // Conectar ao banco de dados
        $conn = new mysqli('localhost', 'root', '', 'novabasedados');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Buscar os produtos na base de dados
        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        // Exibir os produtos como checkboxes com campo de quantidade
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<input type='checkbox' name='produtos[{$row['id']}]' value='{$row['id']}'> {$row['nome']} - R$ {$row['preco']}<br>";
                echo "Quantidade: <input type='number' name='quantidades[{$row['id']}]' min='1' value='1'><br>";
                echo "</div>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }

        $conn->close();
        ?><br><br>

        <button type="submit">Gerar Notinha</button>
    </form>

    <a href="ver-cadastros.php">Alterar Valores</a>
</body>
</html>
