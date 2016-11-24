<?php

$id = $_GET["id"];
require_once 'dao/DaoMarca.php';
$DaoMarca = DaoMarca::getInstance();
$exe = $DaoMarca->deletar($id);
if ($exe) {
    echo "<script type='text/javascript'>"
    . " alert('Excluído com Sucesso!');"
    . "location.href='?pg=marcas';"
    . "</script>";
} else {
    echo "<script type='text/javascript'>"
    . " alert('Não foi possível excluir!');"
    . "location.href='?pg=marcas';"
    . "</script>";
}
