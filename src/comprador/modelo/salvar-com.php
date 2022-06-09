<?php

//obter a conexão com o banco
include('../../conexao/conn.php');

//obter os dados enviados do formulario
$requestData = $_REQUEST;

//vrificação de campos obrigatorios
if(empty($requestData['NOME']) || empty($requestData['CELULAR'])){
    //variavel vazia retornar erro
    $dados  = array(
        "tipo" => 'error',
        "mensagem" => 'O meu consagrado me ajuda a te ajudar completa os bagui.'

    );


} else {
    //se estiver preenchidos
    $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
    $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

    //verificação cadastro
    if($operacao == 'insert'){
        //insert banco
        try{
            $stmt = $pdo->prepare('INSERT INTO COMPRADOR (NOME, CELULAR) VALUES (:a, :b)');
            $stmt->execute(array(
    ':a' => utf8_decode($requestData['NOME']),
    ':b' => utf8_decode($requestData['CELULAR'])

));
$dados  = array(
    "tipo" => 'success',
    "mensagem" => 'Ta registrado meu consagrado'

);


        }catch(PDOException $e){
            $dados  = array(
                "tipo" => 'erro',
                "mensagem" => 'Não deu pra salvar: '.$e

        
            );
        }
    } else{
        //se a operação vir vazia fazer update
        try{
            $stmt = $pdo->prepare('UPDATE TIPO SET NOME = :a, CELULAR = :b WHERE ID = :id');
            $stmt->execute(array(
                ':id' => $ID, 
    ':a' => utf8_decode($requestData['NOME']),
    ':b' => utf8_decode($requestData['CELULAR'])
));
$dados  = array(
    "tipo" => 'success',
    "mensagem" => 'registro atualizado meu consagrado'

);


        }catch(PDOException $e){
            $dados  = array(
                "tipo" => 'error',
                "mensagem" => 'Não foi pra salvar: '.$e

        
            );
        }
    }
}

//converter o nossa array para json
echo json_encode($dados);