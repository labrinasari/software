
	
        <link rel="icon" href="img/logo.png" type="image/x-icon" />
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<?php
session_start();
if (!empty($_SESSION["login"]) && $_SESSION["validou"] == true) {
    header("Location:principal.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilo_login.css" type="text/css" media="all"/>
    </head>
    <body>
        <div>
            <h2><img src="img/tyy.png"> InfoSet Informática</h2>
            <hr>
            <br/>
            <form method="post" action="login.php">
                <label>Login: </label>
                <input type="text" name="login" required/>   
                <br/>
                <label>Senha: </label>
                <input type="password" name="senha" required/>
                <br/>
                <input type="submit" name="entrar" value="Entrar"/>        
            </form>
        </div>
    </body>
</html>
