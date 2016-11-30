<?php
session_start();
if (empty($_SESSION["login"]) && $_SESSION["validou"] != true) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/principal_style.css" type="text/css" media="all"/>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="titulo">
                    <h2><i><img src="img/ty.png"></i></h2>
                    <span>Rio do Sul, <?= Date("d/m/Y"); ?></span> 
                </div>
                <div class="titulo">
                    <span><i class="fa fa-user fa-lg"></i> <?= $_SESSION["nome"]; ?></span><br/>     
                    <a href="?pg=altersenha&id=<?= $_SESSION["id"] ?>"><i class="fa fa-key fa-lg"></i> Alterar Senha</a>
                </div>
                <div class="sair">                    
                    <a href="logout.php"><i class="fa fa-sign-out fa-1x"></i> Sair</a><br/>                    
                </div>
            </div>
            <div id="content">
                <div id="menu">                   
                    <ul>
                        <li><a href="?pg=home" <?= (@$_GET["pg"] == "home" || empty($_GET["pg"])) ? "class='active'" : ""; ?>><i class="fa fa-home fa-1x"></i> Home</a></li>
                        <li><a href="?pg=funcionarios" <?= (@$_GET["pg"] == "funcionarios") ? "class='active'" : ""; ?>><i class="fa fa-users fa-1x"></i> Funcionários</a></li>
                        <li><a href="?pg=categoria" <?= (@$_GET["pg"] == "categoria") ? "class='active'" : ""; ?>><i class="fa fa-registered fa-1x"></i> Categoria</a></li>
                        <li><a href="?pg=produtos" <?= (@$_GET["pg"] == "produtos") ? "class='active'" : ""; ?>><i class="fa fa-dropbox fa-1x"></i> Produtos</a></li>
                        <li><a href="?pg=clientes" <?= (@$_GET["pg"] == "clientes") ? "class='active'" : ""; ?>><i class="fa fa-smile-o fa-1x"></i> Clientes</a></li>
                    </ul>  
                </div>
                <div id="content-main">
                    <div>
                        <?php
                        @$pg = $_GET["pg"];
                        if (isset($pg)) {
                            include_once $pg . '.php';
                        } else {
                            include_once 'home.php';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div id="footer">
                <hr>
                <p>2016 - &copy - Todos os Direitos Reservados.</p>
            </div>
        </div>
    </body>
</html>
