<div class="box_titulo_interno">
    <H2><i class="fa fa-dropbox fa-1x"></i> Adicionar Produtos</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=produtos">Voltar</a>
</div>
<br>
<hr>
<br>
<div class="formulario">
    <form method="post" enctype="multipart/form-data">
        <label>Descrição do Produto:</label>
        <input type="text" name="descricao" required/>
        <br/>
        <label>Categoria:</label>
        <select name="categoria" required>
            <option value="">Selecione a Categoria</option>
            <?php
            require_once 'dao/DaoCategoria.php';
            $DaoCategoria = DaoCategoria::getInstance();
            $dadosCategoria = $DaoCategoria->listar();
            foreach ($dadosCategoria as $rowCategoria) {
                echo "<option value='{$rowCategoria["id"]}'>{$rowCategoria["descricao"]}</option>";
            }
            ?>
        </select>
        <br/>
        <label>Preço:</label>
        <input type="text" name="preco" required/>
        <br/>
        <label>Promoção?</label>
        <select name="promocao">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
        <br/>
        <label>Imagem:</label>
        <input type="file" name="imagem" required/>
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>    
    </form>
</div>
<?php
require_once './dao/DaoProdutos.php';
require_once './model/Produtos.php';
if (isset($_POST["botao"])) {
    $produtos = new Produtos();
    $produtos->setDescricao($_POST["descricao"]);
    $produtos->setCategoria($_POST["categoria"]);
    $produtos->setPreco($_POST["preco"]);
    $produtos->setImagem($_FILES["imagem"]["name"]);
    $produtos->setPromocao($_POST["promocao"]);

    /*     * *upload de imagem* */
    $pastaDestino = "fotos/";
    $arquivoDestino = $pastaDestino . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);
    chown($arquivoDestino, 777);
    /*     * *fim do upload** */



    $DaoProdutos = DaoProdutos::getInstance();
    $exe = $DaoProdutos->inserir($produtos);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Cadastrado com Sucesso!');"
        . "location.href='?pg=produtos';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível cadastrar!');"
        . "</script>";
    }
}