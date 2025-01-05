<?php
include 'connection.php';

// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Nem sql injecion passa, pode vir tranquilo, afoba não
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $autor = $conn->real_escape_string($_POST['autor']);
    $ano_publicacao = $conn->real_escape_string($_POST['ano_publicacao']);
    $genero = $conn->real_escape_string($_POST['genero']);
    $resenha = $conn->real_escape_string($_POST['resenha']);
    $pontuacao = (int)$_POST['pontuacao'];
    $imagem = '';
    $status_livro = $conn->real_escape_string($_POST['status_livro']);

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['imagem']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
            $imagem = 'uploads/' . uniqid() . '.' . $filetype;
            if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem)) {
                $imagem = '';
            }
        }
    }
    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, genero, resenha, pontuacao, imagem, status_livro)
            VALUES ('$titulo', '$autor', '$ano_publicacao', '$genero', '$resenha', '$pontuacao', '$imagem','$status_livro')";

    if ($conn->query($sql) === TRUE) {
        header("Location: adicionar_livro_form.php?success=1");
        exit();
    } else {
        header("Location: adicionar_livro_form.php?error=1");
        exit();
    }
}

$conn->close();
?>
