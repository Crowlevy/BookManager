<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca_pessoal";

$conn = new mysqli($servername, $username, $password, $dbname);

//O die serve como um break de todo o código caso haja um problema com a conexão do servidor, pode ser bastante útil
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//CÓDIGO DO ADICIONAR LIVRO CASO DÊ ALGUM BUG
/*$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblioteca_pessoal";

// Conectando ao banco de dados
$conn = new mysqli($host, $user, $password, $dbname);
//O die serve como um break de todo o código caso haja um problema com a conexão do servidor, pode ser bastante útil
if ($conn->connect_error) {
    die("Teve um problema de conexão: " . $conn->connect_error);
}
*/

?>

