<?php
// Iniciando sessão
session_start();

require 'header.php';
require 'db_connect.php';

if(isset($_POST['btn-cadastrar'])){
    // recebendo os valores
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $usuario = mysqli_escape_string($connect, $_POST['usuario']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    // validando e inserindo dados no banco
    if(!empty($nome) && !empty($usuario) && !empty($senha)){
        $senha = md5($senha);
        $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";
        $query ="SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = mysqli_query($connect,$query);
        $linha = mysqli_num_rows($resultado);

        if($linha >= 1){
           echo '<h3 class="secho">Usuario já cadastrado!</h3>';
        }else{
           mysqli_query($connect, $sql);
            echo '<h3 class="secho">Usuario Cadastrado!</h3>';
        }

    }else{
       echo '<h3 class="secho">Preencha todos os campos!</h3>';
    }
}
?>
    <section class="padrao">
        <h1>Cadastre-se</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method= "post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha">
        <input type="submit" value="CADASTRAR" name ="btn-cadastrar">
        <a href="index.php">ENTRAR</a>


        </form>
    </section>
<?php
require 'footer.php'
?>

