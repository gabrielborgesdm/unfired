<?php
session_start();
require_once 'funcoesConexao.php';

if(empty($_POST["area"]) and empty($_POST["acao"])){
    if(empty($_POST["nome"])){
        header("Location: formArea.php");
    }else{
        $nome = $_POST["nome"];
        if(empty($_SESSION["idArea"])){
            $sql = "INSERT INTO area(nome) VALUES(\"$nome\")";
            inserir($sql);
        }else {
            $id = $_SESSION["idArea"];
            session_destroy();
            $sql = "UPDATE area SET nome = '$nome' WHERE id = $id" ;
            inserir($sql);
        }    
    }
    
}else{
    (empty($_POST["area"]))?$area = null : $area = $_POST["area"];
    (empty($_POST["acao"]))?$acao = null : $acao = $_POST["acao"];
    
    if($acao == 2){
        deletar("area", Array("id",$area));
   
    }else{
        header("Location: formArea.php?id=$area");
    }
}    