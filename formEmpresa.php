<?php
session_start();
include 'header.php';
require_once"funcoesConexao.php";
$result = listarArea();
if($result == null){
	$html = '<section class="container-fluid mt-4 mb-5">
		<div class="row">
			<div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
				<h1 class="text-center mt-4 ">Perfil de Empresa</h1>
				<div class="col-12 mx-auto">
					<p class="text-danger lead text-center">
						Não há áreas registradas, cadastre <a href="formArea.php">aqui</a>.
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
				<h1 class="text-center mt-4 ">Perfil de Empresa</h1>
                <p class = "text-warning small"><a href="formArea.php">Clique aqui</a> para cadastrar sua área caso não a encontre na lista.</p>
				<div class="col-12 mx-auto">
					<form method="post" id="formCargo" action="processaEmpresa.php">
						<div class="form-group py-3">
							<label for="area">Área de trabalho desejada</label>
							<select name="area" id="area" class="form-control">';
							while($row = mysqli_fetch_array($result)){
								$html.="<option value='".$row['id']."'>".$row['nome']."</option>";
							}
	$html.=' 				</select>
						</div>
                        
						<div class="form-group py-3">
							<label for="nome">Nome da empresa</label>
							<input type="text" class="form-control" name="nome" id="nome" required/>
						</div>
						
                        <div class="form-group py-3">
							<label for="email">E-mail para contato</label>
							<input type="text" class="form-control" name="email" id="email" required/>
						</div>

                        <div class="form-group py-3">
							<label for="endereco">Endereço</label>
							<input type="text" class="form-control" name="endereco" id="endereco" required/>
						</div>
                        
                        <div class="form-group py-3">
							<label for="descricao">Descrição da empresa</label>
							<textarea rows="5" name="descricao" id="descricao" class="form-control" style="resize:none"></textarea>
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

