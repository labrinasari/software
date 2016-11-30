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
        <input type="hidden" name="cpf_funcionarios" value="<?= $atualizar["cpf_funcionarios"] ?>"/>        
        <label>Nome Completo:</label>
        <input type="text" name="nome" value="<?= $atualizar["nome"] ?>" required/>
        <br/>     
        <label>Login:</label>
        <input type="text" name="usuario" value="<?= $atualizar["usuario"] ?>" required/>
        <br/>
        <label>Função:</label>
        <input type="text" name="funcao" value="<?= $atualizar["funcao"] ?>" required/>
        <br/>
        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?= $atualizar["endereco"] ?>" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>              
    </form>
</div>
<?php
require_once './dao/DaoFuncionario.php';
require_once './model/Funcionario.php';
if (isset($_POST["botao"])) {
    $funcionario = new Funcionario();
    $funcionario->setCpf_funcionarios($_POST["cpf_funcionarios"]);
    $funcionario->setNome($_POST["nome"]);
    $funcionario->setFuncao($_POST["funcao"]);
    $funcionario->setEndereco($_POST["endereco"]);
    $funcionario->setLogin($_POST["usuario"]);

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
?>