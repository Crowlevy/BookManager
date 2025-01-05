<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);/*o password default tem sido uma melhor opção para criptografia
    ele mantém a criptografia em constante transformação caso haja algo melhor, seu comprimento é 255 e já o 
    PASSWORD_BCRYPT é de 60 caracteres*/
    
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        header("Location: login.php?success=1");
    } else {
        header("Location: register.php?error=1");
    }

    $stmt->close();
    $conn->close();
}
?>
