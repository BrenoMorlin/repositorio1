<?php
include ("conexao.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

$sql = "select nome from usuarios where cpf = '$cpf' and senha='$senha' ";
if ($resultado = $conn->query($sql)){
 die("erro");
}

$row = resultado->fetch_assoc();

if (isset($row) && $row ["nome"] != ''){
    session_start();
    $_SESSION ["cpf"] = $cpf;
    $_SESSION ["senha"] = $senha;
    $_SESSION ["nome"] = $row["nome"];

    header("Location: gravar.php");
}else{
    die("Senha Incorreta");
}