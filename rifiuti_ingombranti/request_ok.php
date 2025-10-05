<?php
session_start();
if (!isset($_SESSION['loggato'])||$_SESSION['loggato']!==true) {
    header("location:./login_index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../stile.css" />

    <title>JunkJedis</title>
</head>
<body style= "background-color: #54cc9a">
    <div class="text-center">
        <br>
        <img src="../images/logo_verde.png" width="100px">
        <br>
        <br>
        <h2>La tua richiesta è stata presa in carico. <br>  Clicca
            <a href=./richiesta.php> qui </a> per tornare alla pagina di gestione account.</h2>
    </div>

    
</body>
</html>