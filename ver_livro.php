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

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($livro['titulo']); ?> - Detalhes</title>
    <link rel="stylesheet" href="css/style-main.css?v=1.0">
    <link rel="stylesheet" href="css/style-view.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Biblioteca Pessoal Do Joãozinho
            </a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="adicionar_livro_form.php">Adicionar Livro</a></li>
                    <li><a href="#">Meus Livros</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="form-container-view">
            <h2><?php echo htmlspecialchars($livro['titulo']); ?></h2>
            <div class="details-container">
                <?php
                if (!empty($livro['imagem']) && file_exists($livro['imagem'])) {
                    echo "<img src='" . htmlspecialchars($livro['imagem']) . "' alt='Imagem do Livro' style='max-width: 300px; border-radius: 10px;'>";
                } else {
                    echo "<img src='uploads/book-placeholder.jpg' alt='Imagem do Livro' style='max-width: 300px; border-radius: 10px;'>";
                }
                ?>
                <div class="details-text">
                    <p><strong>Autor:</strong> <?php echo htmlspecialchars($livro['autor']); ?></p>
                    <p><strong>Ano de Publicação:</strong> <?php echo htmlspecialchars($livro['ano_publicacao']); ?></p>
                    <p><strong>Gênero:</strong> <?php echo htmlspecialchars($livro['genero']); ?></p>
                    <p><strong>Pontuação:</strong> <span
                            class="rating"><?php echo htmlspecialchars($livro['pontuacao']); ?>/10</span></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($livro['status_livro']); ?></p>

                    <p><strong>Resenha:</strong> <?php echo nl2br(htmlspecialchars($livro['resenha'])); ?></p>
                </div>
            </div>
            <a href="editar_livro.php?id=<?php echo $livro['id']; ?>" class="btn-edit-book animated-btn">Editar Livro</a>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Biblioteca Pessoal Do Joãozinho (O melhor de todos) - Todos os direitos reservados</p>
        </div>
    </footer>
</body>

</html>