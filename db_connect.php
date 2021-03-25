<?php
// criando conexão
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "criarlogin";

$connect = mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_error()){
    echo "erro:" . mysqli_connect_error() ;
}