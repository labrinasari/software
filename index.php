<?php
session_start ();
if (!empty($_SESSION["login"]) && $_SESSION["validou"] == true) {
    header("location:pagina_principal.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/login_style.css" type="text/css" media="all"/>
        <style>
            form {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <h2 style="text-align: center;"><i><img src="img/so.jpg" width="300px" height="100px" ></i></h2>
            <br/>
            <form method="post" action="login.php">
                <label>Login: </label><br>
                <input type="text" name="login" required/>   
                <br/>
                <label>Senha: </label><br>
                <input type="password" name="senha" required/>
                <br/>
                <input type="submit" name="entrar" value="Entrar"/>        
            </form>
        </div>
    </body>
</html>
