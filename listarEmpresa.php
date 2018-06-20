<?php 
include 'header.php';
require_once 'funcoesConexao.php';

if(!empty($_POST)){
    (!empty($_POST["search"]))?$search = $_POST["search"]:$search = null;
    (!empty($_POST["orderBy"]))?$orderBy = $_POST["orderBy"]:$orderBy = null;
    (!empty($_POST["ordenacao"]))?$ordenacao = $_POST["ordenacao"]:$ordenacao = null;
    
    $campos = Array('nome', 'nome_area', 'endereco');

    if ($orderBy != null) {
        switch ($orderBy) {
            case 1:
                $orderBy = "nome";
                break;
            case 2:
                $orderBy = "nome_area";
                break;
            case 3:
                $orderBy = "endereco";
                break;
            default:
                $orderBy = null;
                break;
        }

        if (empty($ordenacao)) {
            $ordenacao = 'ASC';
        } else {
            switch ($ordenacao) {
                case 2:
                    $ordenacao = 'DESC';
                    break;
                default:
                    $ordenacao = 'ASC';
                    break;
            }
        }
    }
    

    $result = filtrar("view_empresa", $campos, $search, $orderBy, $ordenacao);
    
}else{
    
    $result = listar("view_empresa");
}

if($result == null){
    $html = '
    <section class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
                <h1 class="text-center mt-4 ">Empresas cadastradas</h1>
                <div class="col-12 mx-auto">
                    <p class="text-danger lead text-center">
                        Não há registro de empresas no sistema. Cadastre <a href="formEmpresa.php">clicando aqui</a>.
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
                <h1 class="text-center mt-4 ">Página da Empresa:</h1>
                <section class="col-10 mx-auto m-4">
                    <form class="col-12 mt-5" method="post" action="#">
                        <h2 class="mt-4">Filtro de pesquisa:</h2>
                        <input class="form-control my-2 col-12" type="search" name="search" placeholder="Procurar por" aria-label="Search"/>
                        <select class="form-control text-secondary mb-2" name="orderBy">
                            <option value="0">Ordenar por</option>
                            <option value="1">Nome</option>
                            <option value="2">Área de interesse</option>
                            <option value="3">Endereço</option>
                        </select>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="ordenacao" id="cresc" value="1" class="form-check-input" checked="checked"/>
                            <label class="form-check-label" for="cresc">Crescente(A-Z)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="ordenacao" id="decresc" value="2" class="form-check-input">
                            <label class="form-check-label" for="decresc">Decrescente(Z-A)</label>
                        </div> 
                        
                        <button class="btn btn-outline-success col-12 mt-2" type="submit">Pesquisar</button>
                    </form>
                </section>
               <div class="col-10 my-4 mx-auto table-responsive">
                    <h2 class="mt-4 pl-2">Empresas cadastradas:</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Área de interesse</th>
                                <th>Endereço</th>
                                <th>Página de perfil</th>
                            </tr>
                        </thead>
                        <tbody>';
    
                        while($row = mysqli_fetch_array($result)){
                            $html.=
                            '<tr>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['nome_area'].'</td>
                                <td>'.$row['endereco'].'</td>
                                <td><a href="perfilEmpresa.php?id='.$row['id'].'">Ver mais</a></td>
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

