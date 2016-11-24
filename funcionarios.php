<div class="box_titulo_interno">
    <H2><i class="fa fa-users fa-1x"></i> Lista de Funcionários</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=addFuncionario">Adicionar</a>
</div>
<br>
<hr>
<br>
<?php
require_once 'dao/DaoFuncionario.php';
$DaoFuncionario = DaoFuncionario::getInstance();
$dados = $DaoFuncionario->listar();
?>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Login</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "<td><a href='?pg=editFuncionario&id=$id' title='Editar'><i class='fa fa-pencil fa-lg'></i></a>"
        . " <a href='?pg=delFuncionario&id=$id' title='Excluir' onclick='return confirm(\"Deseja excluir?\")'><i class='fa fa-trash fa-lg'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>