<?php

$id = $_GET["id"];
require_once 'dao/DaoProdutos.php';
$DaoProdutos = DaoProdutos::getInstance();
$dadosProdutos = $DaoProdutos->getProdutos($id);$pastaDestino = "fotos/";
$arquivoDestino = $pastaDestino . $dadosProdutos["imagem"];
$exe = $DaoProdutos->deletar($id);
if ($exe) {
    chown($arquivoDestino, 666);    
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
