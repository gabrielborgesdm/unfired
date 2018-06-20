<?php 
include 'header.php';
require_once 'funcoesConexao.php';

if(empty($_GET['id'])){
    $id = null;
}else{
    $id = $_GET['id'];
    $result = listar("view_empresa", Array("id", $id));
}


if(empty($_GET['id']) or empty($result)){
    header("Location: listarEmpresa.php");
}else{
    $result = mysqli_fetch_array($result);
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary ">
                <h1 class="text-center m-4 ">Perfil da Empresa:</h1>
                <hr/>
                <p class="m-3">
                    <h3>Nome da empresa:</h3>
                    '.$result['nome'].'
                </p>
                
                <p class="m-3">
                    <h3>Descrição da empresa</h3>
                    '.$result['descricao'].'
                </p>

                <p class="m-3">
                    <h3>Área de procura:</h3>
                    '.$result['nome_area'].'
                </p>

                <p class="m-3">
                    <h3>E-mail:</h3>
                    '.$result['email'].'
                </p>

                <p class="m-3">
                        <h3>Endereço:</h3>
                    '.$result['endereco'].'
                </p>
                
                <a class="btn btn-lg btn-outline-secondary my-4" href="listarEmpresa.php">Voltar</a>
                
            </div>
        </div>
    </section>';
}
echo $html;
include 'footer.php';

