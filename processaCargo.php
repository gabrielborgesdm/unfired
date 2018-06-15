<?php
session_start();
require_once 'configDB.php';

(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];
(empty($_POST["area"])) ? header("Location: formErro.php") : $area = $_POST["area"];

$con = configDB();
$sql = "INSERT INTO cargo(nome, id_area) VALUES(\"$nome\", \"$area\");";

if(mysqli_query($con, $sql)){
	header("Location: formSucesso.php");
}else{
	echo mysqli_error($con);
	//header("Location: formErro.php");
}