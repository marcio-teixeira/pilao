<?php
require('inc/globals.php'); // Require in all pages

if (!$_GET['msg']) {
    header('Location: ' . url_path());
    exit;
} else {
    $msg = $_GET['msg'];
}
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
                if ($msg == 'cnpj-nao-encontrado') {
                    include 'inc/mensagem-cnpj-nao-encontrado.php';
                }
                if ($msg == 'cnpj-invalido') {
                    include 'inc/mensagem-cnpj-invalido.php';
                }
                if ($msg == 'ja-participa') {
                    include 'inc/mensagem-ja-participa.php';
                }
                
            ?>
                <?php //include 'inc/mensagem-cnpj.php';?>
        </div>
        <?php include 'inc/footer.php'; ?>
        <?php include 'inc/regulamento.php'; ?>
    </body>

    </html>