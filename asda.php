<?php 
include 'header.php';
?>
<section class="container-fluid mt-4 mb-5">       
            
            <div class="row">
                
                <div class="col-sm-3 border border-2">
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
                <div class="col-sm-3 border border-2">
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
                
                
            </div>
          
    </section>';