<?php
session_start();
require_once 'configDB.php';

(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];

$con = configDB();
$sql = "INSERT INTO cargo(nome) VALUES(\"$nome\");";

if(mysqli_query($con, $sql)){
	header("Location: formSucesso.php");
}else{
	//echo mysqli_error($con);
	header("Location: formErro.php");
}