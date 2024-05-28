
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

// Cria a tabela 'produtos' na nova base de dados
$sql = "CREATE TABLE produtos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'produtos' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
