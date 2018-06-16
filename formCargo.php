<?php
session_start();
include 'header.php';

$html='
<section class="container-fluid mt-4 mb-5">
    <div class="row">
        <div class="col-11 col-md-10 col-lg-8 mx-auto border border-2 border-dark rounded divForm">
            <h1 class="text-center mt-4 ">Cadastro de Cargos</h1>
            <div class="col-12 mx-auto">
                <form method="post" id="formCargo" action="processaCargo.php">
                    
                    <div class="form-group py-3">
                        <label for="nome">Nome do Cargo</label>
                        <input type="text" class="form-control" name="nome" id="nome" required/>
                    </div>

                    <div class="form-group row py-3">
                        <input type="submit" name="submit" id="submit" class="btn btn-lg col-8 col-md-6 mx-auto btn-outline-secondary">
                    </div>    
                </form>
            </div>
        </div>
    </div>
</section>';

echo $html;
include 'footer.php';
?>

