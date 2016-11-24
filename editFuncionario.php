<?php
$id = $_GET["id"];
require_once 'dao/DaoFuncionario.php';
$DaoFuncionario = DaoFuncionario::getInstance();
$atualizar = $DaoFuncionario->getFuncionario($id);
?>
<div class="box_titulo_interno">
    <H2><i class="fa fa-registered fa-1x"></i> Editar Funcionário</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=funcionarios">Voltar</a>
</div>
<br>
<hr>
<br>
<div class="formulario">
    <form method="post">
        <input type="hidden" name="id" value="<?= $atualizar["id"] ?>"/>        
        <label>Nome Completo:</label>
        <input type="text" name="nome" value="<?= $atualizar["nome"] ?>" required/>
        <br/>     
        <label>Login:</label>
        <input type="text" name="login" value="<?= $atualizar["login"] ?>" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>              
    </form>
</div>
<?php
require_once './dao/DaoFuncionario.php';
require_once './model/Funcionario.php';
if (isset($_POST["botao"])) {
    $funcionario = new Funcionario();
    $funcionario->setId($_POST["id"]);
    $funcionario->setNome($_POST["nome"]);
    $funcionario->setLogin($_POST["login"]);

    $DaoFuncionario = DaoFuncionario::getInstance();
    $exe = $DaoFuncionario->atualizar($funcionario);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Atualizado com Sucesso!');"
        . "location.href='?pg=funcionarios';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível atualizar!');"
        . "</script>";
    }
}