<?php

$id = $_GET["id"];
require_once 'dao/DaoProduto.php';
$DaoProduto = DaoProduto::getInstance();
$dadosProduto = $DaoProduto->getProduto($id);
$exe = $DaoProduto->deletar($id);
if ($exe) {

    $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino . $dadosProduto["imagem"];
    //permissao no arquivo
    chown($arquivoDestino, 666);
    //apaga imagem atual para trocar pela nova
    unlink($arquivoDestino);

    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=produtos';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=produtos';"
    . "</script>";
}
