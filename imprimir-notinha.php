<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notinha de Supermercado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Processar os dados do formulário
$clienteNome = $_POST["nome"] ?? '';
$clienteEndereco = $_POST["endereco"] ?? '';
$produtosSelecionados = $_POST["produtos"] ?? [];
$quantidades = $_POST["quantidades"] ?? [];

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'novabasedados');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar se há produtos selecionados
if (is_array($produtosSelecionados) && count($produtosSelecionados) > 0) {
    // Inicializar a soma total
    $total = 0;

    // Exibir a "notinha" de supermercado para impressão
    echo "<div class='nota'>";
    echo "<img src='oi.png' alt='Logo' class='logo'>"; // Adiciona a logo
    echo "<h1>Tomazela Piscinas</h1>";
    echo "<h3>Cliente:</h3>";
    echo "<p><strong>Nome:</strong> $clienteNome</p>";
    echo "<p><strong>Endereço:</strong> $clienteEndereco</p>";
    echo "<h3>Produtos Selecionados:</h3>";
    echo "<ul>";
    foreach ($produtosSelecionados as $produtoId) {
        $sql = "SELECT * FROM produtos WHERE id = $produtoId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantidade = isset($quantidades[$produtoId]) ? (int)$quantidades[$produtoId] : 1;
            $preco = $row["preco"];
            $valorTotal = $preco * $quantidade;
            echo "<li>{$row["descricao"]} - R$ {$preco} x {$quantidade} = R$ {$valorTotal}</li>";
            // Somar o preço do produto ao total
            $total += $valorTotal;
        }
    }
    echo "</ul>";

    // Exibir o total
    echo "<p><strong>Total:</strong> R$ $total</p>";
    echo "</div>";
} else {
    echo "Nenhum produto selecionado.";
}

$conn->close();
?>

</body>
</html>
