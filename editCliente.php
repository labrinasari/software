<?php
$id = $_GET["id"];
require_once 'dao/DaoCliente.php';
$DaoCliente = DaoCliente::getInstance();
$atualizar = $DaoCliente->getCliente($id);
?>
<div class="box_titulo_interno">
    <H2><i class="fa fa-smile-o fa-1x"></i> Editar Cliente</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=clientes">Voltar</a>
</div>
<br>
<hr>
<br>
<div class="formulario">
    <form method="post">
        <input type="hidden" name="cpf" value="<?= $atualizar["cpf"] ?>"/>        
        <label>Nome Completo:</label>
        <input type="text" name="nome" value="<?= $atualizar["nome"] ?>" required/>
        <br/>     
        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?= $atualizar["endereco"] ?>" required/>
        <br/>
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= $atualizar["telefone"] ?>" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>              
    </form>
</div>
<?php
require_once './dao/DaoCliente.php';
require_once './model/Cliente.php';
if (isset($_POST["botao"])) {
    $cliente = new Cliente();
    $cliente->setCpf($_POST["cpf"]);
    $cliente->setNome($_POST["nome"]);
    $cliente->setEndereco($_POST["endereco"]);
    $cliente->setTelefone($_POST["telefone"]);

    $DaoCliente = DaoCliente::getInstance();
    $exe = $DaoCliente->atualizar($cliente);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Atualizado com Sucesso!');"
        . "location.href='?pg=clientes';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível atualizar!');"
        . "</script>";
    }
}
?>