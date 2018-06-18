<?php
require_once"configDB.php";

function listar($name){
	$con = configDB();
	$sql = "SELECT * FROM $name ";
	$result = mysqli_query($con, $sql);
	(mysqli_num_rows($result) > 0)?: $result = null;
	return $result;
}

function inserir($sql){
    $con = configDB();
    if(mysqli_query($con, $sql)){
        header("Location: formSucesso.php");
    }else{
        echo mysqli_error($con);
        header("Location: formErro.php");
}
}