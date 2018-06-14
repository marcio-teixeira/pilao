<?php
$username = 'promo_acao_pdv';
$password = 'AHVt6e7llfIu';

try {
    $conn = new PDO('mysql:host=promo_acao_pdv.mysql.dbaas.com.br;dbname=promo_acao_pdv', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

/* IMPORT DO CSV */
$row = 0;
if (($handle = fopen("lista3.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $query = $conn->prepare("SELECT * FROM franquias WHERE cnpj = :cnpj");
        $query->execute(array(':cnpj' =>$data[3]));

        $franquias = $query->fetchAll();


        if (!$franquias) {
            $statement = $conn->prepare("INSERT INTO franquias(codigo, loja, cnpj, razao_social, nome_fantasia, uf, cidade, segmento)
            VALUES(:codigo, :loja, :cnpj, :razao_social, :nome_fantasia, :uf, :cidade, :segmento)");
            $statement->execute(array(
                //':id' => '',
                ':codigo' => $data[1],
                ':loja' => $data[2],
                ':cnpj' => $data[3],
                ':razao_social' => $data[4],
                ':nome_fantasia' => $data[5],
                ':uf' => $data[6],
                ':cidade' => $data[7],
                ':segmento' => $data[13]
            ));
            echo 'inseriu linha ' . $row . '<br>';
        }
        $row++;
    }
}
