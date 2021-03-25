<?php
// iniciando sessão
session_start();
require 'db_connect.php';

if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}

$id = $_SESSION['id_usuario'];


$query = "DELETE FROM usuarios WHERE id = '$id'";
if(mysqli_query($connect,$query)){
    header('location:index.php');
}else{
    echo "erro ao deletar a conta";
}
