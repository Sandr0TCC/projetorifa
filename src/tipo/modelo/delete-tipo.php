<?php

//Incluindo nossa conexão com o banco de dados 
include('../../src/conexao/conn.php');

$ID = $_REQUEST['ID'];

$sql = "DELETE * FROM TIPO WHERE ID = $ID";

$resultado = $pdo->query($sql);

if($resultado){
    $dados = array(
        'tipo' => 'success',
        'mensagem' => ' Registro excluido com sucesso!'
    );
}else{
    $dados = array(
        'tipo' => 'error',
        'mensagem' => 'Não foi possivel excluir o registro selecionado'
    );
}
echo json_encode ($dados);