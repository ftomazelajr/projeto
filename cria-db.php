<?php
$servername = "localhost";
$username = "root";
$password = ""; // senha do seu MySQL, se houver

// Cria a conexão
$conn = new mysqli($servername, $username, $password);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cria a nova base de dados
$sql = "CREATE DATABASE novabasedados";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
