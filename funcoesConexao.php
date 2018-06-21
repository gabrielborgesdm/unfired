<?php
require_once"configDB.php";

function listar($name, $where = null){
    $con = configDB();
    $sql = "SELECT * FROM $name ";
    if(!empty($where)){
        $sql .=" WHERE $where[0] = $where[1]";
    }
    $result = mysqli_query($con, $sql);
    (mysqli_num_rows($result) > 0)?: $result = null;
    return $result;
}

function deletar($name, $where){
    $con = configDB();
    $sql = "DELETE FROM $name  WHERE $where[0] = $where[1]";
    if(mysqli_query($con, $sql)){
        header("Location: formSucesso.php");
    }else{
        echo mysqli_error($con);
        //header("Location: formErro.php");
    }
    
}

function inserir($sql){
    $con = configDB();
    if(mysqli_query($con, $sql)){
        header("Location: formSucesso.php");
    }else{
        //echo mysqli_error($con);
        header("Location: formErro.php");
    }
}

function filtrar($table, $campos, $search, $orderBy, $ordenacao) {
	$sql = "SELECT * FROM $table WHERE ";
   
    if(is_array($campos)){
        for($i = 0; $i < count($campos);$i++) {
            if ($i < (count($campos) - 1)){
                $sql .= "$campos[$i] LIKE \"%$search\" OR $campos[$i] LIKE \"%$search%\" OR $campos[$i] LIKE \"$search%\" OR ";
            }else {
                $sql .= "$campos[$i] LIKE \"%$search\" OR $campos[$i] LIKE \"%$search%\" OR $campos[$i] LIKE \"$search%\" ";
            }
        }
    } else {
        $sql .= "$campos LIKE \"%$search\" OR $campos LIKE \"%$search%\" OR $campos LIKE \"$search%\" ";
    }
    $sql .= "ORDER BY $orderBy $ordenacao";
    
    $con = configDB();
    $result = mysqli_query($con, $sql);
    (mysqli_num_rows($result) > 0)?: $result = null;
    return $result;
    
    
        
            
}