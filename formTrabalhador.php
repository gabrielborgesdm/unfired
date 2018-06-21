<?php
session_start();
include 'header.php';
require_once"funcoesConexao.php";
$result = listar("area");
$result2 = listar("cargo");
if($result == null || $result2 == null){
    if($result == null){
        $msg['nome'] = "áreas de trabalho";
        $msg['link'] = "formArea.php";
    }else{
        $msg['nome'] = "cargos de trabalho";
        $msg['link'] = "formCargo.php";
    }
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
                <h1 class="text-center mt-4 ">Perfil de Trabalhador</h1>
                <div class="col-12 mx-auto">
                    <p class="text-danger lead text-center">
                        Não há registro de '.$msg['nome'].' no sistema, cadastre <a href="'.$msg['link'].'">clicando aqui</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>';
}else{
	
	$html='
	<section class="container-fluid mt-4 mb-5">
            <div class="row">
                <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
                    <h1 class="text-center mt-4 ">Perfil de Trabalhador</h1>
                    <p class = "text-warning small"><a href="formArea.php">Clique aqui</a> para cadastrar sua área caso não a encontre na lista.</p>
                    <p class = "text-warning small"><a href="formCargo.php">Clique aqui</a> para cadastrar seu cargo caso não o encontre na lista.</p>
                    <div class="col-12 mx-auto">
                        <form method="post" id="formCargo" action="processaTrabalhador.php" enctype="multipart/form-data">
                            <div class="form-group py-3">
                                <label for="area">Área de trabalho desejada</label>
                                <select name="area" id="area" class="form-control">';
                                while($row = mysqli_fetch_array($result)){
                                    $html.="<option value='".$row['id']."'>".$row['nome']."</option>";
                                }
$html.='                        </select>
                                <spam class="text-secondary small">Encontrou algo de errado? <a href="altPagina.php">clique aqui</a> para alterar alguma área.</spam>
                            </div>
                            <div class="form-group py-3">
                                <label for="cargo">Cargo de trabalho desejada</label>
                                <select name="cargo" id="cargo" class="form-control">';
                                    while($row = mysqli_fetch_array($result2)){
                                            $html.="<option value='".$row['id']."'>".$row['nome']."</option>";
                                    }
$html.=' 			</select>
                                <spam class="text-secondary small">Encontrou algo de errado? <a href="altPagina.php">clique aqui</a> para alterar algum cargo.</spam>
                            </div>

                            <div class="form-group py-3">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" class="form-control" name="nome" id="nome" required/>
                            </div>

                            <div class="form-group py-3">
                                <label for="cidadeEstado">Cidade e Estado onde mora</label>
                                <input type="text" class="form-control" placeholder="Cidade, Estado" name="cidadeEstado" id="cidadeEstado" required/>
                            </div>
                        
                            <div class="form-group py-3">
                                <label class="d-block">Sexo</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="M" value="M">
                                    <label class="form-check-label" for="M">Masculino</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="F" value="F">
                                    <label class="form-check-label" for="F">Feminino</label>
                                </div>
                            </div>
						
                            <div class="form-group py-3">
                                <label for="email">E-mail para contato</label>
                                <input type="text" class="form-control" name="email" id="email" required/>
                            </div>
                            
                            <div class="form-group py-3">
                                <label for="data_nasc">Data de nascimento</label>
                                <input type="date" class="form-control" name="data_nasc" id="data_nasc" required/>
                            </div>

                            <div class="form-group py-3">
                                <label for="telefone">Telefone para contato</label>
                                <input type="tel" class="form-control" placeholder="(xx)xxxx-xxxx" name="telefone" id="telefone" required/>
                            </div>
                        
                            <div class="form-group py-3">
                                <label for="escolaridade">Escolaridade</label>
                                <select name="escolaridade" id="escolaridade" class="form-control">
                                    <option>Fundamental incompleto</option>
                                    <option>Fundamental completo</option>
                                    <option>Cursando ensino médio</option>
                                    <option>Ensino médio incompleto</option>
                                    <option selected>Ensino médio completo</option>
                                    <option>Cursando ensino superior</option>
                                    <option>Curso superior incompleto</option>
                                    <option>Curso superior completo</option>
                                </select>
                            </div>
                            
                            <div class="form-group py-3">
                                <label for="curriculo">Cúrriculo(.docs)</label>
                                <input type="file" class="form-control-file" name="curriculo" id="curriculo">
                            </div>
                            
                            <div class="form-group row py-3">
                                <input type="submit" name="submit" id="submit" class="btn btn-lg col-8 col-md-6 mx-auto btn-outline-secondary">
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
	</section>';
}
echo $html;
include 'footer.php';
?>
