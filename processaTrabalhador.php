<?php
require_once 'funcoesConexao.php';
require_once 'processaArquivo.php';
(empty($_POST["area"])) ? header("Location: formErro.php") : $area = $_POST["area"];
(empty($_POST["cargo"])) ? header("Location: formErro.php") : $cargo = $_POST["cargo"];
(empty($_POST["nome"])) ? header("Location: formErro.php") : $nome = $_POST["nome"];
(empty($_POST["cidadeEstado"])) ? header("Location: formErro.php") : $cidadeEstado = $_POST["cidadeEstado"];
(empty($_POST["sexo"])) ? header("Location: formErro.php") : $sexo = $_POST["sexo"];
(empty($_POST["email"])) ? header("Location: formErro.php") : $email = $_POST["email"];
(empty($_POST["data_nasc"])) ? header("Location: formErro.php") : $data = $_POST["data_nasc"];
(empty($_POST["telefone"])) ? header("Location: formErro.php") : $telefone = $_POST["telefone"];
(empty($_POST["escolaridade"])) ? header("Location: formErro.php") : $escolaridade = $_POST["escolaridade"];

//Caso exista algum arquivo ele chama a funcao de processamento de arquivo e recebe o nome do arquivo gerado pela funcao
(empty($_FILES["curriculo"])) ?$curriculo = null: $curriculo = processandoArquivo($_FILES["curriculo"]); ;

$sql = "INSERT INTO trabalhador(id_area, id_cargo, nome, cidade_estado, sexo, email, data_nasc, telefone, escolaridade, curriculo) "
        . "VALUES(\"$area\", \"$cargo\", \"$nome\", \"$cidadeEstado\", \"$sexo\", \"$email\", \"$data\",  $telefone, \"$escolaridade\", \"$curriculo\")";

inserir( $sql);