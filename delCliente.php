<?php

$id = $_GET["id"];
require_once 'dao/DaoCliente.php';
$DaoCliente = DaoCliente::getInstance();
$exe = $DaoCliente->deletar($id);
if ($exe) {
    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=clientes';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=clientes';"
    . "</script>";
}
