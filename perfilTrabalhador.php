<?php 
include 'header.php';
require_once 'funcoesConexao.php';

if(empty($_GET['id'])){
    $id = null;
}else{
    $id = $_GET['id'];
    $result = listar("view_trabalhador", Array("id", $id));
}


if(empty($_GET['id']) or empty($result)){
    header("Location: listarTrabalhador.php");
}else{
    $result = mysqli_fetch_array($result);
    $html = '  
     <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary ">
                <h1 class="text-center m-4 ">Perfil do Trabalhador:</h1>
                <hr/>
                <div class="row">
                    <div class="col-sm-3 offset-sm-2">
                        <p class="mt-3">
                            <h3>Nome do Trabalhador:</h3>
                            '.$result['nome'].'
                        </p>

                        <p class="mt-3">
                            <h3>Sexo:</h3>
                            '.$result['sexo'].'
                        </p>

                        <p class="mt-3">
                            <h3>Data de Nascimento:</h3>
                            '.$result['data_nasc'].'
                        </p>

                        <p class="mt-3">
                            <h3>E-mail:</h3>
                            '.$result['email'].'
                        </p>

                        <p class="mt-3">
                                <h3>Telefone:</h3>
                            '.$result['telefone'].'
                        </p>

                        <p class="mt-3">
                                <h3>Endereço:</h3>
                            '.$result['cidade_estado'].'
                        </p>
                    </div>
                    
                    <div class="col-sm-3 offset-sm-2">
                        <p class="mt-3">
                            <h3>Escolaridade:</h3>
                            '.$result['escolaridade'].'
                        </p>

                        <p class="mt-3">
                            <h3>Área de interesse:</h3>
                            '.$result['nome_area'].'
                        </p>

                        <p class="mt-3">
                            <h3>Cargo de interesse:</h3>
                            '.$result['nome_cargo'].'
                        </p>
                        
                        <p class="mt-3">
                            <h3>Baixar o Cúrriculo:</h3>
                            <a class="link" href="/unfired/uploads/'.$result['curriculo'].'">Clique aqui</a>
                        </p>

                        
                    </div>
                </div>
                <a class="btn btn-lg btn-outline-secondary my-4" href="listarTrabalhador.php">Voltar</a>
                
            </div>
        </div>
    </section>';
    
}
echo $html;
include 'footer.php';

