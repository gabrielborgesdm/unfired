<?php
function configDB(){
	$db = Array(
	"host" => "localhost",
	"name" => "unfired",
	"user" => "root",
	"password" => ""
	);
    $con = mysqli_connect($db['host'],$db['user'],$db['password'],$db['name']);
	
	if(!$con){
		header("Location: formErro.php");
		die();
	}else{
        mysqli_set_charset($con,"utf8");
		return $con;
	}
}

