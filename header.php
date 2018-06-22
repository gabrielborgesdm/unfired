<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Unfired</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/mainStyle.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg border-bottom col-8 mx-auto">
            <a class="navbar-brand text-danger" href="index.php">Unfired</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarList" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarList">
                <ul class="navbar-nav  px-2 pr-5 ml-auto text-danger">
                    <li class="nav-item px-1">
                        <a class="nav-link text-danger" href="index.php">Início</a>
                    </li>
					
					<li class="nav-item px-1">
                        <a class="nav-link text-danger" href="listarTrabalhador.php">Trabalhadores</a>
                    </li>
					
					<li class="nav-item px-1">
                        <a class="nav-link text-danger" href="listarEmpresa.php">Empresas</a>
                    </li>

                    <li class="nav-item dropdown px-1 justify-content-end">
                        <a class="nav-link text-danger dropdown-toggle" href="#" id="dropCadastro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropCadastro">
                            <a class="dropdown-item" href="formTrabalhador.php">Trabalhador</a>
                            <a class="dropdown-item" href="formEmpresa.php">Empresa</a>
                        </div>
                    </li>

                </ul>          
            </div>
        </nav>  