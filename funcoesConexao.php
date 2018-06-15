<?php
require_once"configDB.php";

function listarArea(){
	$con = configDB();
	$sql = "SELECT * FROM area ";
	$result = mysqli_query($con, $sql);
	(mysqli_num_rows($result) > 0)?: $result = null;
	return $result;
}
