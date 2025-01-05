<?php
include 'connection.php';

// Verificando se o ID do livro foi passado
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql = "SELECT * FROM livros WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $livro = $result->fetch_assoc();
    } else {
        echo "Livro não encontrado.";
        exit();
    }
} else {
    echo "ID inválido.";
    exit();
}

//Atualização do livro no BD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];
    $pontuacao = $_POST['pontuacao'];
    $resenha = $_POST['resenha'];

    $sql = "UPDATE livros SET titulo=?, autor=?, ano_publicacao=?, genero=?, pontuacao=?, resenha=?, status_livro=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $titulo, $autor, $ano_publicacao, $genero, $pontuacao, $resenha, $status_livro, $id);

    if ($stmt->execute()) {
        echo "Livro atualizado com sucesso!";
        header("Location: ver_livro.php?id=$id");
        exit();
    } else {
        echo "Erro ao atualizar o livro.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/style-main.css?v=1.0">
    <link rel="stylesheet" href="css/style-view.css?v=1.0">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Editar Livro</a></h1>
        </div>
    </header>

    <main>
        <section class="form-container">
            <form action="editar_livro.php?id=<?php echo $id; ?>" method="POST">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>"
                    required>

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>"
                    required>

                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="text" id="ano_publicacao" name="ano_publicacao"
                    value="<?php echo htmlspecialchars($livro['ano_publicacao']); ?>" required>

                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($livro['genero']); ?>"
                    required>

                <label for="pontuacao">Pontuação (0-10):</label>
                <input type="number" id="pontuacao" name="pontuacao"
                    value="<?php echo htmlspecialchars($livro['pontuacao']); ?>" min="0" max="10" required>

                <label for="resenha">Resenha:</label>
                <textarea id="resenha" name="resenha"
                    required><?php echo htmlspecialchars($livro['resenha']); ?></textarea>

                <label for="status_livro">Status do Livro:</label>
                <select id="status_livro" name="status_livro" required>
                    <option value="ativo">Ativo</option>
                    <option value="emprestado">Emprestado</option>
                    <option value="perdido">Perdido</option>
                </select>
                
                <div class="btn-container">
                    <input type="submit" class="btn-edit-book animated-btn" value="Atualizar Livro">
                    <a href="index.php" class="btn-edit-book animated-btn">Voltar para a Biblioteca</a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Biblioteca Pessoal Do Joãozinho (O melhor de todos) - Todos os direitos reservados</p>
        </div>
    </footer>
</body>

</html>