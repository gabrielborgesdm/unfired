<?php
function configDB(){
	//Omite os erros do php
	error_reporting(0);
	
	$db = Array(
	"host" => "localhost",
	"name" => "unfired",
	"user" => "root",
	"password" => "root"
	);
    
	$con = mysqli_connect($db['host'],$db['user'],$db['password'],$db['name']);
		
	
	if(mysqli_connect_errno($con)){
		header("Location: formErro.php");
		die();
	}else{
        mysqli_set_charset($con,"utf8");
		return $con;
	}
}

