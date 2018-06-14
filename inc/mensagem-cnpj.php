<section id="formulario">
    <article>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-sm-12 col-md-5">
                    <div class="formLateral">
                        <div class="mensagem cnpj">
                            <p>
                                <em>
                                    <strong>O CNPJ FOI CADASTRADO COM SUCESSO!</strong>
                                    <br> AGORA, AUTOMATICAMENTE, VOCÊ TAMBÉM ESTÁ PARTICIPANDO DA AÇÃO COM TODOS OS CNPJ DOS SEUS
                                    DEMAIS ESTABELECIMENTOS
                                </em>
                            </p>
                            <p>
                                <?php
                                    foreach ($franquias as $franquia) {
                                        echo mask($franquia['cnpj'], '##.###.###/####-##') . '<br>';
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>