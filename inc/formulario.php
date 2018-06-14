<section id="formulario">
    <article>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-sm-12 col-md-5">
                    <div class="formLateral">
                        <form name="cadastro" id="cadastro" method="post" action="<?php echo url_path() ?>sucesso.php">
                            <div class="campo">
                                <input class="ipt" name="nome" id="nome" type="text" placeholder="Nome*" required>
                            </div>
                            <div class="campo">
                                <input class="ipt" name="email" id="email" type="email" placeholder="E-mail*" required>
                            </div>
                            <div class="campo">
                                <input class="ipt m-cnpj" name="cnpj" id="cnpj" type="text" placeholder="CNPJ*" required>
                            </div>
                            <div class="campo">
                                <input class="check" type="checkbox" name="aceito" id="aceito" value="aceito" required>
                                <label>Li o
                                    <a href="#" title="Regulamento" data-toggle="modal" data-target="#regulamento">regulamento</a> e aceito os termos e condições.</label>
                            </div>
                            <input class="btEnviar" type="submit" name="btEnviar" value="CADASTRE AGORA">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>