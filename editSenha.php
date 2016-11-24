<?php
$id = $_GET["id"];
require_once 'dao/DaoFuncionario.php';
$DaoFuncionario = DaoFuncionario::getInstance();
$atualizar = $DaoFuncionario->getFuncionario($id);
?>
<div class="box_titulo_interno">
    <H2><i class="fa fa-key fa-1x"></i> Alterar Senha do Funcionário</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=home">Cancelar</a>
</div>
<br>
<hr>
<br>
<div class="formulario">
    <form method="post">
        <input type="hidden" name="id" value="<?= $atualizar["id"] ?>"/>        
        <label>Nome Completo:</label>
        <input type="text" name="nome" value="<?= $atualizar["nome"] ?>" disabled/>
        <br/>     
        <label>Senha Atual:</label>
        <input type="password" name="senhaatual"  required/>
        <br/>
        <label>Nova Senha:</label>
        <input type="password" name="novasenha"  required/>
        <br/>
        <label>Confirmar Nova Senha:</label>
        <input type="password" name="confirmarnovasenha"  required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>              
    </form>
</div>
<?php
require_once './dao/DaoFuncionario.php';
require_once './model/Funcionario.php';
if (isset($_POST["botao"])) {
    $senhaAtual = $_POST["senhaatual"];
    $novaSenha = $_POST["novasenha"];
    $confirmarNovaSenha = $_POST["confirmarnovasenha"];
    if ($atualizar["senha"] != $senhaAtual) {
        echo "<script type='text/javascript'>"
        . " alert('Senha atual informada é inválida!');"
        . "</script>";
    } elseif ($novaSenha != $confirmarNovaSenha) {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível confirmar a nova senha, tente novamente!');"
        . "</script>";
    } else {
        $funcionario = new Funcionario();
        $funcionario->setId($_POST["id"]);
        $funcionario->setSenha($novaSenha);
        $DaoFuncionario = DaoFuncionario::getInstance();

        $exe = $DaoFuncionario->atualizarSenha($funcionario);
        if ($exe) {
            echo "<script type='text/javascript'>"
            . " alert('Atualizado com Sucesso!');"
            . "location.href='logout.php';"
            . "</script>";
        } else {
            echo "<script type='text/javascript'>"
            . " alert('Não foi possível atualizar!');"
                    . "return false;"
            . "</script>";
        }
    }
}