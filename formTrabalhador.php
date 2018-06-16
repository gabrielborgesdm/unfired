<?php
session_start();
include 'header.php';
require_once"funcoesConexao.php";
$result = listarArea();
$result2 = listarCargo();
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
				<h1 class="text-center mt-4 ">Perfil de usuário</h1>
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
				<h1 class="text-center mt-4 ">Perfil de usuário</h1>
                <p class = "text-warning small"><a href="formArea.php">Clique aqui</a> para cadastrar sua área caso não a encontre na lista.</p>
                <p class = "text-warning small"><a href="formArea.php">Clique aqui</a> para cadastrar seu cargo caso não o encontre na lista.</p>
				<div class="col-12 mx-auto">
					<form method="post" id="formCargo" action="processaTrabalhador.php">
						<div class="form-group py-3">
							<label for="area">Área de trabalho desejada</label>
							<select name="area" id="area" class="form-control">';
							while($row = mysqli_fetch_array($result)){
								$html.="<option value='".$row['id']."'>".$row['nome']."</option>";
							}
	$html.=' 				</select>
						</div>
                        
                        <div class="form-group py-3">
							<label for="area">Cargo de trabalho desejada</label>
							<select name="cargo" id="cargo" class="form-control">';
							while($row = mysqli_fetch_array($result2)){
								$html.="<option value='".$row['id']."'>".$row['nome']."</option>";
							}
	$html.=' 				</select>
						</div>
                        
						<div class="form-group py-3">
							<label for="nome">Nome Completo</label>
							<input type="text" class="form-control" placeholder="Joaquin da Silva" name="nome" id="nome" required/>
						</div>
                        
                        <div class="form-group py-3">
							<label for="telefone">Data de nascimento</label>
							<input type="text" class="form-control" placeholder="Araraquara, São Paulo" name="telefone" id="telefone" required/>
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
							<input type="text" class="form-control" placeholder="joaquinsilva@gmail.com" name="email" id="email" required/>
						</div>

                        <div class="form-group py-3">
							<label for="telefone">Telefone para contato</label>
							<input type="text" class="form-control" placeholder="(16) 3010-1030" name="telefone" id="telefone" required/>
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
							<label for="objetivos">Seu objetivo</label>
							<textarea rows="5" name="objetivos" id="objetivos" class="form-control" style="resize:none"></textarea>
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
