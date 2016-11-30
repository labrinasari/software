<?php

$id = $_GET["id"];
require_once 'dao/DaoCategoria.php';
$DaoCategoria = DaoCategoria::getInstance();
$exe = $DaoCategoria->deletar($id);
if ($exe) {
    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=categoria';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=categoria';"
    . "</script>";
}
