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

// Obtém os dados do formulário
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// Insere os dados na tabela 'produtos'
$sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', $preco)";

if ($conn->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso";
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
}

$conn->close();
?>
