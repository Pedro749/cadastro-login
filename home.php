<?php
// iniciando sessao
session_start();
require 'db_connect.php';
require 'header.php';

if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id' ";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

mysqli_close($connect);
?>
<h2>Olá <?= $dados['nome']?>! Seja bem vindo(a)!</h2>
<a href="logout.php" class="sair">SAIR</a>
<a href="delete.php" class="deletar" onclick="return confirm('Deseja excluir essa conta?')">DELETAR CONTA</a>
<?php
    require 'footer.php';
?>