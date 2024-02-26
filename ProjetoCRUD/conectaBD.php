<?php
// endereco
// nome do BD
// usuario
// senha
$endereco = 'localhost';
$banco = 'postgresPhp';
$adm = 'postgres';
$senha = 'postgres7210';

try {
    // sgbd:host;port;dbname
    // usuario
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $adm,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Conectado no banco de dados!!!";

    $sql1 = "CREATE TABLE IF NOT EXISTS usuario (ID serial, NOME varchar(255), DATA_NASCIMENTO varchar(255), TELEFONE varchar(255), EMAIL varchar(255), SENHA varchar(255))";
    $sql2 = "CREATE TABLE IF NOT EXISTS anuncio (ID serial PRIMARY KEY, fase varchar(255), tipo varchar(255), porte varchar(255), sexo varchar(255), pelagem_cor varchar(255), raca varchar(255), observacao varchar(255), email_usuario varchar(255))";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute();
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();


   
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados.<br\>";
    die($e->getMessage());
}
