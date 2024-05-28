<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notinha de Supermercado</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "novabasedados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM produtos WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Produto excluído com sucesso.";
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }
} else {
    echo "ID do produto não fornecido.";
}

$conn->close();
?>
<a href="visualizar-cadastros.php">Voltar</a>
