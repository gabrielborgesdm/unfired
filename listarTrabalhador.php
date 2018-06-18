<?php 
include 'header.php';
require_once 'configDB.php';
require_once 'funcoesConexao.php';

$con = configDB();
$result = listar("view_trabalhador");


if($result == null){
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
                <h1 class="text-center mt-4 ">Trabalhadores registrados</h1>
                <div class="col-12 mx-auto">
                    <p class="text-danger lead text-center">
                        Não há registro de trabalhadores no sistema. Cadastre <a href="formTrabalhador.php">clicando aqui</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>';
}else{
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm text-secondary">
                <h1 class="text-center mt-4 ">Trabalhadores cadastados</h1>
                <div class="col-12 my-4 mx-auto table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Área de interesse</th>
                                <th>Cidade/Estado</th>
                                <th>Página de perfil</th>
                            </tr>
                        </thead>
                        <tbody>';
    
                        while($row = mysqli_fetch_array($result)){
                            $html.=
                            '<tr>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['nome_area'].'</td>
                                <td>'.$row['cidade_estado'].'</td>
                                <td><a href="perfilTrabalhador.php?id='.$row['id'].'">Ver mais</a></td>
                            </tr>      
                            ';        
                           
                        }
    
                        $html.= 
                        '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>';
}
echo $html;
include 'footer.php';

