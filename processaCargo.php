<?php
require_once 'funcoesConexao.php';


(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];

$sql = "INSERT INTO cargo(nome) VALUES(\"$nome\");";

inserir($sql);