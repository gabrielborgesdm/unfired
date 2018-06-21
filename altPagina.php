<?php 
include 'header.php';
require_once 'funcoesConexao.php';
session_start();

if(empty($_POST['tabela'])){
    $tabela = null;
}else{
    $tabela = $_POST['tabela'];
    switch ($tabela){
        case 1:
            $result = listar("area"); 
            break;
        case 2:
            $result = listar("cargo"); 
            break;
        default:
            $tabela = null;
            break;
    }
    
}

if(empty($tabela)){
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary ">
                <h1 class="text-center m-4 ">Alterar tabelas</h1>
                <hr/>
                <div class="col-12 mx-auto">
                    <form method="post" action="#">
                        <div class="form-group">
                            <label class="d-block">Selecione qual tabela deseja alterar:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tabela" id="area" value="1">
                                <label class="form-check-label" for="area">Área</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tabela" id="cargo" value="2">
                                <label class="form-check-label" for="cargo">Cargo</label>
                            </div>
                        </div>
                        
                        <div class="form-group row py-3">
                            <input type="submit" name="submit" id="submit" class="btn btn-lg col-8 col-md-6 mx-auto btn-outline-secondary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>';
}else{
    if($tabela == 1){
    $html = '  
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary ">
                <h1 class="text-center m-4 ">Alterar Áreas:</h1>
                <hr/>
                <div class="col-12 mx-auto">
                    <form method="post" action="processaArea.php">
                        <div class="form-group py-3">
                            <label for="area">Área que deseja alterar:</label>
                            <select name="area" id="area" class="form-control">';
                            while($row = mysqli_fetch_array($result)){
                                $html.="<option value='".$row['id']."'>".$row['nome']."</option>";
                            }
$html.='                    </select>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Ação:</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acao" id="alterar" value="1">
                                <label class="form-check-label" for="alterar">Alterar</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acao" id="remover" value="2">
                                <label class="form-check-label" for="remover">Remover</label>
                            </div>
                            
                            <div class="form-group row py-3">
                                <input type="submit" name="submit" id="submit" class="btn btn-lg col-8 col-md-6 mx-auto btn-outline-secondary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>';
    }else{
    $html = '  
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary ">
                <h1 class="text-center m-4 ">Alterar Cargos:</h1>
                <hr/>
                <div class="col-12 mx-auto">
                    <form method="post" action="processaCargo.php">
                        <div class="form-group py-3">
                            <label for="cargo">Cargo que deseja alterar:</label>
                            <select name="cargo" id="cargo" class="form-control">';
                            while($row = mysqli_fetch_array($result)){
                                $html.="<option value='".$row['id']."'>".$row['nome']."</option>";
                            }
$html.='                    </select>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Ação:</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acao" id="alterar" value="1">
                                <label class="form-check-label" for="alterar">Alterar</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acao" id="remover" value="2">
                                <label class="form-check-label" for="remover">Remover</label>
                            </div>
                            
                            <div class="form-group row py-3">
                                <input type="submit" name="submit" id="submit" class="btn btn-lg col-8 col-md-6 mx-auto btn-outline-secondary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>';
    }
    
}
echo $html;
include 'footer.php';

