<?php

require 'bd.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$turma = $_POST["turma"];
$data = $_POST["data"];
var_dump($_POST);

$sql = "INSERT INTO alunos (id, nome, email, turma, data) 
VALUES (NULL, '$nome', '$email', '$turma', '$data')";

$con = dbcon();

$res = mysqli_query($con, $sql);

if ($res == true) {
    echo "Dados cadastrados com sucesso!";
    header("Location: index.php");
} else {
    echo "Ocorreu um erro!";
}
?>
