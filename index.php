<?php
include 'connection.php';

// Buscando os livros já ordenando
$ordenacao = isset($_GET['ordenar_por']) ? $_GET['ordenar_por'] : 'data_adicao';
$sql = "SELECT * FROM livros ORDER BY " . ($ordenacao == 'ano' ? 'ano_publicacao DESC' : 'data_adicao DESC');

//$sql = "SELECT * FROM livros ORDER BY data_adicao DESC";
//$sql ="SELECT * FROM livros ORDER BY ano DESC"; caso eu implemente a funcionalidade de ordenar pela data de lançamento
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Biblioteca Pessoal</title>
    <link rel="stylesheet" href="css/style.css?v=1.0">
    <link rel="stylesheet" href="css/style-main.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1>Biblioteca Pessoal Do Joãozinho</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="adicionar_livro_form.php">Adicionar Livro</a></li>
                    <li><a href="remover_livro.php" class="botao-principal">Remover Livros</a></li>
                    <li><a href="#">Meus Livros</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="intro">
            <div class="container">
                <h2>Bem-vindo à sua Biblioteca Digital</h2>
                <p>Organize, avalie e resenhe seus livros favoritos em um só lugar.</p>
                <a href="adicionar_livro_form.php" class="btn-add-book animated-btn">ADICIONAR NOVOS LIVRO</a>
            </div>
        </section>

        <section class="books">
            <div class="container">
                <h2>Meus Livros</h2>
                <div class="book-grid">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='book-card'>";
                            if (!empty($row['imagem']) && file_exists($row['imagem'])) {
                                echo "<img src='" . htmlspecialchars($row['imagem']) . "' alt='Imagem do Livro'>";
                            } else {
                                echo "<img src='uploads/book-placeholder.jpg' alt='Imagem do Livro'>";
                            }
                            echo "<h3>" . htmlspecialchars($row['titulo']) . " (" . htmlspecialchars($row['ano_publicacao']) . ")</h3>";
                            echo "<p><strong>Autor:</strong> " . htmlspecialchars($row['autor']) . "</p>";
                            echo "<p><strong>Pontuação:</strong> <span class='rating'>" . htmlspecialchars($row['pontuacao']) . "/10</span></p>";
                            echo "<p><strong>Gênero:</strong> " . htmlspecialchars($row['genero']) . "</p>";
                            echo "<p><strong>Status:</strong>" .htmlspecialchars($row['status_livro']). "</p>";
                            echo "<a href='ver_livro.php?id=" . $row['id'] . "' class='btn-small animated-btn'>Ver Mais</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p style='text-align:center;'>Nenhum livro cadastrado.</p>";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Biblioteca Pessoal Do Joãozinho (O melhor de todos) - Todos os direitos reservados</p>
        </div>
    </footer>
</body>

</html>