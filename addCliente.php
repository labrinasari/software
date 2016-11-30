<div class="box_titulo_interno">
    <H2><i class="fa fa-smile-o fa-1x"></i> Adicionar Cliente</H2>
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
        <label>CPF</label>
        <input type="text" name="cpf" required/>
        <br/>
        <label>Nome Completo:</label>
        <input type="text" name="nome" required/>
        <br/>
        <label>Endereço:</label>
        <input type="text" name="endereco" required/>
        <br/>
        <label>Telefone:</label>
        <input type="text" name="telefone" required/>
        <br>
        <input type="submit" name="botao" value="Confirmar"/>    
    </form>
</div>
<?php
require_once 'dao/DaoCliente.php';
require_once 'model/Cliente.php';
if (isset($_POST["botao"])) {
    $clientes = new Cliente();
    $clientes->setCpf($_POST["cpf"]);
    $clientes->setNome($_POST["nome"]);
    $clientes->setEndereco($_POST["endereco"]);
    $clientes->setTelefone($_POST["telefone"]);
    
    $DaoCliente = DaoCliente::getInstance();
    $exe = $DaoCliente->inserir($clientes);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cadastrado com Sucesso!');"
        . "location.href='?pg=clientes';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível cadastrar!');"
        . "</script>";
    }
}