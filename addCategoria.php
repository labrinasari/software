<div class="box_titulo_interno">
    <H2><i class="fa fa-registered fa-1x"></i> Adicionar Categoria</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=categoria">Voltar</a>
</div>
<br>
<hr>
<br>
<div class="formulario">
    <form method="post">
        <label>Descrição:</label>
        <input type="text" name="descricao" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>    
    </form>
</div>
<?php
require_once './dao/DaoCategoria.php';
require_once './model/Categoria.php';
if (isset($_POST["botao"])) {
    $categoria = new Categoria();
    $categoria->setDescricao($_POST["descricao"]);

    $DaoCategoria = DaoCategoria::getInstance();
    $exe = $DaoCategoria->inserir($categoria);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cadastrado com Sucesso!');"
        . "location.href='?pg=categoria';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível cadastrar!');"
        . "</script>";
    }
}