<?php
require_once 'funcoesConexao.php';

(empty($_POST["area"])) ? header("Location: formErro.php") : $area = $_POST["area"];
(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];
(empty($_POST["email"])) ? header("Location: formErro.php") : $email = $_POST["email"];
(empty($_POST["endereco"])) ? header("Location: formErro.php") : $endereco = $_POST["endereco"];
(empty($_POST["descricao"])) ? header("Location: formErro.php") : $descricao = $_POST["descricao"];

$sql = "INSERT INTO empresa(id_area, nome, email, endereco, descricao) VALUES(\"$area\", \"$nome\", \"$email\", \"$endereco\", \"$descricao\")";

inserir($sql); 