<div class="box_titulo_interno">
    <H2><i class="fa fa-registered fa-1x"></i> Adicionar Funcionario</H2>
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
        <label>CPF</label>
        <input type="text" name="cpf" required/>
        <br/>
        <label>Nome Completo:</label>
        <input type="text" name="nome" required/>
        <br/>
        <label>Funcao:</label>
        <input type="text" name="funcao" required/>
        <br/>
        <label>Endereco:</label>
        <input type="text" name="endereco" required/>
        <br/>
        <label>Usuario:</label>
        <input type="text" name="usuario" required/>
        <br/>
        <label>Senha:</label>
        <input type="password" name="senha" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>    
    </form>
</div>
<?php
require_once './dao/DaoFuncionario.php';
require_once './model/Funcionario.php';
if (isset($_POST["botao"])) {
    $funcionarios = new Funcionario();
    $funcionarios->setCpf_funcionarios($_POST["cpf"]);
    $funcionarios->setNome($_POST["nome"]);
    $funcionarios->setFuncao($_POST["funcao"]);
    $funcionarios->setEndereco($_POST["endereco"]);
    $funcionarios->setLogin($_POST["usuario"]);
    $funcionarios->setSenha($_POST["senha"]);
    
    $DaoFuncionario = DaoFuncionario::getInstance();
    $exe = $DaoFuncionario->inserir($funcionarios);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cadastrado com Sucesso!');"
        . "location.href='?pg=funcionarios';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível cadastrar!');"
        . "</script>";
    }
}