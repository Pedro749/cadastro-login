<?php
    // iniciando sessão
    session_start();
    require 'header.php';
    require 'db_connect.php';
    //vareificando se o usuario ja esta logado
    if(isset($_SESSION['logado'])){
        header('Location: home.php');
    } 
    // validando dados e comparando com banco de dados
    if(isset($_POST['btn-entrar'])){
        $usuario = mysqli_escape_string($connect,$_POST['usuario']);
        $senha = mysqli_escape_string($connect,$_POST['senha']);

        if(empty($usuario) || empty($senha)){
            echo '<h3 class= "secho">Preencha todos os campos!</h3>';

        }else{
            $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = mysqli_query($connect, $query);

            if(mysqli_num_rows($resultado) > 0 ){
                $senha = md5($senha);
                $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
                $resultado = mysqli_query($connect, $query);

                    if(!mysqli_num_rows($resultado) == 1 ){
                        echo '<h3 class="secho">Usuario ou senha incorretos!</h3>';
                    }else{
                        $dados = mysqli_fetch_array($resultado);
                        mysqli_close($connect);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        header('location: home.php');
                    }
            }else{
                echo '<h3 class="secho">Usuario inexistente </h3>';
            }
            
            }
        }
        
?>
    <div class="padrao">
        <form action="" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name= "usuario" id = "usuario">
            <label for="senha">Senha</label>
            <input type="password" name= "senha" id = "senha">
            <input type="submit" value="ENTRAR" name="btn-entrar">
            <a href="cadastro.php">Cadastrar</a>
        </form>
    </div>
<?php
    require 'footer.php';
?>