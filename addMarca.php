<div class="box_titulo_interno">
    <H2><i class="fa fa-registered fa-1x"></i> Adicionar Marca</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=marcas">Voltar</a>
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
require_once './dao/DaoMarca.php';
require_once './model/Marca.php';
if (isset($_POST["botao"])) {
    $marca = new Marca();
    $marca->setDescricao($_POST["descricao"]);

    $DaoMarca = DaoMarca::getInstance();
    $exe = $DaoMarca->inserir($marca);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cadastrado com Sucesso!');"
        . "location.href='?pg=marcas';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível cadastrar!');"
        . "</script>";
    }
}