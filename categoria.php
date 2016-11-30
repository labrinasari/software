<div class="box_titulo_interno">
    <H2><i class="fa fa-registered fa-1x"></i> Lista de Categorias</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=addCategoria">Adicionar</a>
</div>
<br>
<hr>
<br>
<?php
require_once 'dao/DaoCategoria.php';
$DaoCategoria = DaoCategoria::getInstance();
$dados = $DaoCategoria->listar();
?>
<table>
    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td><a href='?pg=editCategoria&id=$id' title='Editar'><i class='fa fa-pencil fa-lg'></i></a>"
        . " <a href='?pg=delCategoria&id=$id' title='Excluir' onclick='return confirm(\"Deseja excluir?\")'><i class='fa fa-trash fa-lg'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>