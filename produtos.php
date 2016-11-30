<div class="box_titulo_interno">
    <H2><i class="fa fa-dropbox fa-1x"></i> Lista de Produtos</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=addProdutos">Adicionar</a>
</div>
<br>
<hr>
<br>
<?php
require_once 'dao/DaoProdutos.php';
$DaoProdutos = DaoProdutos::getInstance();
$dados = $DaoProdutos->listar();
?>
<table>
    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Imagem</th>
        <th>Promoção?</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $id = $row["id_produto"];
        echo "<tr>";
        echo "<td>" . $row["id_produto"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["preco"] . "</td>";        
        echo "<td><img src='fotos/{$row["imagem"]}'/></td>";
        $promocao = ($row["promocao"]==1)?"Sim":"Não";
        echo "<td>" . $promocao . "</td>";
        echo "<td><a href='?pg=editProdutos&id=$id' title='Editar'><i class='fa fa-pencil fa-lg'></i></a>"
        . " <a href='?pg=delProdutos&id=$id' title='Excluir' onclick='return confirm(\"Deseja excluir?\")'><i class='fa fa-trash fa-lg'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>