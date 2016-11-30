<?php
$id = $_GET["id"];
require_once 'dao/DaoProdutos.php';
$DaoProdutos = DaoProdutos::getInstance();
$atualizar = $DaoProdutos->getProdutos($id);
?>
<div class="box_titulo_interno">
    <H2><i class="fa fa-dropbox fa-1x"></i> Editar Produto</H2>
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
        <input type="hidden" name="id" value="<?= $atualizar["id_produto"] ?>"/>  
        <label>Descrição do Produto:</label>
        <input type="text" name="descricao" required value="<?= $atualizar["descricao"] ?>"/>
        <br/>
        <label>Categoria:</label>
        <select name="categoria" required>
            <option value="">Selecione a Categoria</option>
            <?php
            require_once 'dao/DaoCategoria.php';
            $DaoCategoria = DaoCategoria::getInstance();
            $dadosCategoria = $DaoCategoria->listar();
            foreach ($dadosCategoria as $rowCategoria) {
                if ($rowCategoria["id"] == $atualizar["categoria_id"]) {
                    echo "<option value='{$rowCategoria["id"]}' selected>{$rowCategoria["descricao"]}</option>";
                } else {
                    echo "<option value='{$rowCategoria["id"]}'>{$rowCategoria["descricao"]}</option>";
                }
            }
            ?>
        </select>
        <br/>
        <label>Preço:</label>
        <input type="text" name="preco" required value="<?= $atualizar["preco"] ?>"/>
        <br/>
        <label>Promoção?</label>
        <select name="promocao">
            <option value="0" <?=($atualizar["promocao"]==0)?"selected":"";?>>Não</option>
            <option value="1" <?=($atualizar["promocao"]==1)?"selected":"";?>>Sim</option>
        </select>
        <br/>
        <label>Imagem Atual:</label><br>
        <input type="image" name="imagem_atual" src="fotos/<?= $atualizar["imagem"] ?>" width="200">
        <br/>
        <br/>
        <label>Nova Imagem:</label>
        <input type="file" name="imagem"  />
        <br/>
        <input type="submit" name="botao" value="Confirmar"/>    
    </form>
</div>
<?php
require_once './dao/DaoProdutos.php';
require_once './model/Produtos.php';
if (isset($_POST["botao"])) {
    $produtos = new Produtos();
    $produtos->setId($_POST["id"]);
    $produtos->setDescricao($_POST["descricao"]);
    $produtos->setCategoria($_POST["categoria"]);
    $produtos->setPreco($_POST["preco"]);    
    $produtos->setPromocao($_POST["promocao"]);    

    /*     * *upload de imagem* */
    if ($atualizar["imagem"] != $_FILES["imagem"]["name"] && !empty($_FILES["imagem"]["name"])) {        
        $pastaDestino = "fotos/";
        $arquivoDestino = $pastaDestino . basename($_FILES["imagem"]["name"]);
        //apaga imagem atual para trocar pela nova
        chown($arquivoDestino, 777);  
        unlink($pastaDestino.$atualizar["imagem"]);
        //envia a nova imagem para a pasta
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);                  
        $produtos->setImagem($_FILES["imagem"]["name"]);
    } else {
        $produtos->setImagem($atualizar["imagem"]);
    }
    /*     * *fim do upload** */

    $DaoProdutos = DaoProdutos::getInstance();
    $exe = $DaoProdutos->atualizar($produtos);
    if ($exe) {
        echo "<script type='text/javascript'>"
        . " alert('Atualizado com Sucesso!');"
        . "location.href='?pg=produtos';"
        . "</script>";
    } else {
        echo "<script type='text/javascript'>"
        . " alert('Não foi possível atualizar!');"
        . "</script>";
    }
}