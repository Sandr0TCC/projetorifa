<?php


// realizar a conexão com o bd
include('../..conexao/conn.php');

//  obter a requisição
$requestData = $_REQUEST;

// obter as colunas que  etão sendo requisitados
$colunas = $requestData['columns'];

// preparar o comnado sql para on=btenção dos rregistros existentes
$sql = "SELECT ID, NOME FROM TIPO WHERE 1=1 ";

// obter o total de registros existentes na tabela do BD
$resultado = $pdo->query($sql);
$qtdeLinhas = $resultado->rowCount();

// verificar se existe algum filtro determinado pelo usuario
$filtro = $requestData['search']['value'];
if( !empty($filtro )) {
    // montar expressão logica
    $sql .= " AND (ID LIKE '$filtro%' ";
    $sql .= " OR NOME LIKE '$filtro%') ";
}

// obter o total de registros existentes na tabela do BD de acordo com o filtro
$resultado = $pdo->query($sql);
$totalFiltrados = $resultado->rowCount();

// Obter os valor para ordenação ORDER BY
$colunaOrdem = $requestData['orer'][0]['column'];
$ordem = $colunas[$colunaOrdem]['data'];
$direcao = $requestData['order'][0]['dir'];

// Obter o valors para o LIMIT
$inicio = $requestData['start'];
$tamanho = $requestData['length'];

// gerando a nossa ordenação na consulta sql
$sql .= "ORDER BY $ordem $direcao LIMIT $inicio, $tamanho";
$resultado = $pdo->query($sql);
$dados = array();
while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    $dados[] = array_map('utf8_encode', $row);
}

// construir o nosso objeto JSON no padrão datatables
$json_data = array(
    "draw" => intval($requestData['draw']),
    "recordsTotal" => intval($qtdeLinhas),
    "recordsFiltered" => intval($totalFiltrados),
    "data" => $dados
);

echo json_encode($json_data);
