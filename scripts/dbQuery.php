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
/*
$row = 1;
if (($handle = fopen("lista2.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $query = $conn->prepare("SELECT * FROM franquias WHERE cnpj = :cnpj");
        $query->execute(array(
    ':cnpj' =>$data[3]
));
        $franquias = $query->fetchAll();

        if (!$franquias) {
            //echo $data[3];
            //var_dump($row);
            $statement = $conn->prepare("INSERT INTO franquias(id, codigo, loja, cnpj, nome_fantasia, uf, segmento)
        VALUES(:id, :codigo, :loja, :cnpj, :nome_fantasia, :uf, :segmento)");
            $statement->execute(array(
            ':id' => '',
            ':codigo' => $data[1],
            ':loja' => $data[2],
            ':cnpj' => $data[3],
            ':nome_fantasia' => $data[4],
            ':uf' => $data[5],
            ':segmento' => $data[8]
        ));
        } else {
            foreach ($franquias as $franquia) {
                //echo $data[2] . ' - ' . $franquia[ 'id'] . '<br>';
                $query = $conn->prepare("UPDATE franquias SET loja = :loja WHERE id LIKE :id");
                $query->execute(array(
                ':id' => $franquia['id'],
                ':loja' => $data[2]
                ));
            }
        }*/

        /*$statement = $conn->prepare("INSERT INTO franquias(id, codigo, loja, cnpj, razao_social, nome_fantasia, uf, cidade, segmento)
        VALUES(:id, :codigo, :loja, :cnpj, :razao_social, :nome_fantasia, :uf, :cidade, :segmento)");
        $statement->execute(array(
            ':id' => $row,
            ':codigo' => $data[0],
            ':loja' => $data[1],
            ':cnpj' => $data[2],
            ':razao_social' => $data[3],
            ':nome_fantasia' => $data[4],
            ':uf' => $data[5],
            ':cidade' => $data[6],
            ':segmento' => $data[7]
        ));*/
       /* $row++;
    }
    fclose($handle);
}*/
