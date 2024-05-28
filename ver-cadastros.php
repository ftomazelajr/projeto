<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastros de Produtos</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // senha do seu MySQL, se houver
    $dbname = "novabasedados";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Seleciona todos os registros da tabela 'produtos'
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibe os dados em uma tabela HTML
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>" . $row["preco"] . "</td>";
            echo "<td>
                    <a href='editar-produto.php?id=" . $row["id"] . "'>Editar</a> |
                    <a href='excluir-produto.php?id=" . $row["id"] . "' onclick=\"return confirm('Tem certeza que deseja excluir este produto?');\">Excluir</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    <a href="index.html">
      <img src="voltar.png" alt="Voltar">
    </a>
    <a href="nota.php">
        <img src="vender.png" alt="">
    </a>
</body>
</html>
