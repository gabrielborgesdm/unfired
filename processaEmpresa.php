<?php
session_start();
require_once 'configDB.php';

(empty($_POST["area"])) ? header("Location: formErro.php") : $area = $_POST["area"];
(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];
(empty($_POST["email"])) ? header("Location: formErro.php") : $email = $_POST["email"];
(empty($_POST["endereco"])) ? header("Location: formErro.php") : $endereco = $_POST["endereco"];
(empty($_POST["descricao"])) ? header("Location: formErro.php") : $descricao = $_POST["descricao"];

$con = configDB();
$sql = "INSERT INTO empresa(id_area, nome, email, endereco, descricao) VALUES(\"$area\", \"$nome\", \"$email\", \"$endereco\", \"$descricao\")";

if(mysqli_query($con, $sql)){
	header("Location: formSucesso.php");
}else{
	//echo mysqli_error($con);
    header("Location: formErro.php");
}