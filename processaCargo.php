<?php
session_start();
require_once 'funcoesConexao.php';

if(empty($_POST["cargo"]) and empty($_POST["acao"])){
    if(empty($_POST["nome"])){
        header("Location: formCargo.php");
    }else{
        $nome = $_POST["nome"];
        if(empty($_SESSION["idCargo"])){
            $sql = "INSERT INTO cargo(nome) VALUES(\"$nome\")";
            inserir($sql);
        }else {
            $id = $_SESSION["idCargo"];
            session_destroy();
            $sql = "UPDATE cargo SET nome = '$nome' WHERE id = $id" ;
            inserir($sql);
        }    
    }
    
}else{
    (empty($_POST["cargo"]))?$cargo = null : $cargo = $_POST["cargo"];
    (empty($_POST["acao"]))?$acao = null : $acao = $_POST["acao"];
    
    if($acao == 2){
        deletar("cargo", Array("id",$cargo));
   
    }else{
        header("Location: formCargo.php?id=$cargo");
    }
}    