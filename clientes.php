<div class="box_titulo_interno">
    <H2><i class="fa fa-smile-o fa-1x"></i> Lista de Clientes</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=addCliente">Adicionar</a>
</div>
<br>
<hr>
<br>
<?php
require_once 'dao/DaoCliente.php';
$DaoCliente = DaoCliente::getInstance();
$dados = $DaoCliente->listar();
?>
<table>
    <tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $id = $row["cpf"];
        echo "<tr>";
        echo "<td>" . $row["cpf"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["endereco"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td><a href='?pg=editCliente&id=$id' title='Editar'><i class='fa fa-pencil fa-lg'></i></a>"
        . " <a href='?pg=delCliente&id=$id' title='Excluir' onclick='return confirm(\"Deseja excluir?\")'><i class='fa fa-trash fa-lg'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>