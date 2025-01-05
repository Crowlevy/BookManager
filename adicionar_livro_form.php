<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro - Minha Biblioteca Pessoal</title>
    <link rel="stylesheet" href="css/style-main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1>Minha Biblioteca Pessoal</h1>
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
        <section class="form-container">
            <h2>Adicionar Novo Livro</h2>
            <?php
            session_start();
            if (isset($_GET['success'])) {
                echo "<p style='color: green; text-align: center;'>Livro adicionado com sucesso!</p>";
                // FAZENDO SEM QUEBRAR A RENDEREIZAÇÃO
                echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000);</script>";
                exit();
            } elseif (isset($_GET['error'])) {
                echo "<p style='color: red; text-align: center;'>Erro ao adicionar o livro. Por favor, tente novamente.</p>";
            }
            ?>
            <form action="adicionar_livro.php" method="POST" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required>

                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" min="1000" max="9999">

                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero">

                <label for="resenha">Resenha:</label>
                <textarea id="resenha" name="resenha" rows="5"></textarea>

                <label for="pontuacao">Pontuação (1-10):</label>
                <input type="number" id="pontuacao" name="pontuacao" min="1" max="10" required>

                <label for="imagem">Imagem do livro:</label>
                <div id="imagem_drop_area" onclick="document.getElementById('imagem').click()"
                    ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                    style="border: 2px dashed #ccc; padding: 20px; text-align: center; cursor: pointer;">
                    Arraste a imagem do livro aqui ou clique para selecionar
                    <img id="imagem_preview" src="uploads/book-placeholder.png" alt="Pré-visualização da imagem"
                        style="max-width: 100%; margin-top: 10px;">
                </div>
                <input type="file" id="imagem" name="imagem" accept="image/*" style="display: none;"
                    onchange="previewImagem(event)">

                <script>
                    function previewImagem(event) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            var output = document.getElementById('imagem_preview');
                            output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function dropHandler(ev) {
                        ev.preventDefault();
                        var file = ev.dataTransfer.files[0];
                        document.getElementById('imagem').files = ev.dataTransfer.files;
                        previewImagem({ target: { files: ev.dataTransfer.files } });
                    }

                    function dragOverHandler(ev) {
                        ev.preventDefault();
                    }
                </script>


                <label for="status_livro">Status do Livro:</label>
                <select id="status_livro" name="status_livro" required>
                    <option value="ativo">Ativo</option>
                    <option value="emprestado">Emprestado</option>
                    <option value="perdido">Perdido</option>
                </select>

                <button type="submit">Adicionar Livro</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Biblioteca Pessoal Do Joãozinho (O melhor de todos) - Todos os direitos reservados</p>
        </div>
    </footer>
</body>


<script>

</script>


</html>