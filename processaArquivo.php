<?php

function processandoArquivo($arquivo){
    //Recupera a data e o horario de envio(horario brasileiro) e adiciona ao nome do arquivo
    date_default_timezone_set("Brazil/East");
    $pedacos = explode(".", $arquivo["name"]);
    $pedacos[0].= date("Ymdhi");
    $arquivo["name"] = implode(".", $pedacos);
  
    $diretorio = "uploads/";
    $diretorio = $diretorio . basename($arquivo["name"]);
    $uploadOk = 1;
    $extensao = strtolower(pathinfo($diretorio,PATHINFO_EXTENSION));

    // Check file size
    if ($arquivo["size"] > 30000) {
        $uploadOk = 0;
    }
    if (file_exists($diretorio)) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($extensao != "doc" && $extensao != "docx"  && $extensao != "docs") {
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: formErro.php");
        die();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($arquivo["tmp_name"], $diretorio)) {
            return $arquivo["name"];
        } else {
            header("Location: formErro.php");
            die();
        }
    }
    
}