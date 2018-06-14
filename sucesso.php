<?php
require('scripts/process.php');
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie7" lang="pt-br"><![endif]-->
<!--[if IE 8]><html class="ie8" lang="pt-br"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="pt-br"><!-->
<html lang="pt-br">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Campanha Pilão Professional</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="title" content="Campanha Pilão Professional">
    <link rel="canonical" href="">
    <?php include 'inc/head.php'; ?>
</head>

<body>
    <?php include 'inc/header.php'; ?>
    <div class="conteudo">
        <?php include 'inc/banner.php'; ?>
        <?php include 'inc/como-participar.php'; ?>
        <?php include 'inc/premios.php'; ?>
        <?php
                if (count($franquias) > 1) {
                    include 'inc/mensagem-cnpj.php';
                } else {
                    include 'inc/mensagem-sucesso.php';
                }
            ?>
    </div>
    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/regulamento.php'; ?>
</body>

</html>