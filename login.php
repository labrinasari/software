<?php
require_once 'dao/DaoFuncionario.php';
if (isset($_POST["entrar"])) {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $DaoFuncionario = DaoFuncionario::getInstance();
    $validou = $DaoFuncionario->getLogin($login,$senha);
    if ($validou["cpf_funcionarios"] > 0) {
        session_start();
        $_SESSION["id"]=$validou["cpf_funcionarios"];
        $_SESSION["login"]=$validou["usuario"];
        $_SESSION["nome"]=$validou["nome"];
        $_SESSION["validou"]=true;        
        header("Location:pagina_principal.php");
    } else {
        echo "<script type='text/javascript'>"
    . "alert('Usuário ou Senha inválidos!');"
    . "location.href='index.php';"
    . "</script>";
    }
}
