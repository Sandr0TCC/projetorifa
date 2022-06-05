<?php 

// Carregar as credenciais do banco de dados
$hostname = "sql105.epizy.com";
$database = "epiz_31858958_rifaorigins";
$user = "epiz_31858958";
$password = "66foh902bz";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Conexão com o banco de dados '.$database.', foi realizado com sucesso!';

}catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();

}

