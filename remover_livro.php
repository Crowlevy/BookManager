<?php
include 'connection.php';

//Verificação feita pelo id do livro, analisando se pertence realmente
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //A remoção do livro pegando pelo id
    $query = "DELETE FROM livros WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $mensagem = "AMEAÇA NEUTRALIZADA COM SUCESSO...OPS, LIVRO REMOVIDO COM SUCESSO";
    } else {
        $mensagem = "HOUVE UM ERRO AO TENTAR REMOVER O LIVRO";
    }
}

$query = "SELECT id, titulo FROM livros";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Livro</title>
    <link rel="stylesheet" href="css/style_remove.css">
</head>
<body>

    <div class="container">
        <h1 class="titulo">Remover Livro</h1>

        <?php if (isset($mensagem)): ?>
            <div class="mensagem">
                <p><?php echo $mensagem; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <ul class="lista-livros">
                <?php while($row = $result->fetch_assoc()): ?>
                    <li class="livro-item">
                        <span><?php echo $row['titulo']; ?></span>
                        <a href="remover_livro.php?id=<?php echo $row['id']; ?>" class="botao-remover" onclick="return confirm('Tem certeza que deseja remover este livro?');">
                            Remover
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p class="nenhum-livro">NÃO FOI ENCONTRADO NENHUM LIVRO</p>
        <?php endif; ?>
    </div>

</body>
</html>
