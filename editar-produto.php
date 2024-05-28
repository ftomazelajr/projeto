<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link rel="style.css" type="text/css" href="styles.css">
</head>
<body>
    <h1>Editar Produto</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "novabasedados";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Atualiza os dados do produto no banco de dados
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];
        
        $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Produto atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar produto: " . $conn->error;
        }
    } else {
        // Obtém os dados do produto
        $id = $_GET["id"];
        $sql = "SELECT * FROM produtos WHERE id='$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Produto não encontrado.";
        }
    }
    
    $conn->close();
    ?>
    
    <form method="post" action="editar-produto.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>"><br>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?php echo $row['descricao']; ?></textarea><br>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?php echo $row['preco']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="ver-cadastros.php">
        <img src="voltar.png" alt="Voltar">
    </a>
   
</body>
</html>
