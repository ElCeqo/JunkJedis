<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggato'])||$_SESSION['loggato']!==true) {
    header("location:./login_index.html");
    exit;
}
$name=$_SESSION['nome'];
$surname=$_SESSION['cognome'];
$dbconn = pg_connect("host=localhost port=5432 dbname=Login 
user=postgres password=admin") 
or die('Could not connect: ' . pg_last_error());
if ($dbconn) {
$municipio = $_POST['inputMuni'];
$rifiuto = $_POST['inputRifiuto'];
$via = $_POST['inputIndirizzo'];
$q2 = "insert into prenotazioni values ($1,$2,$3,$4,$5)"; //Inserisco una nuova tupla nel db
$data = pg_query_params($dbconn, $q2,
    array($name,$surname,$municipio,$rifiuto,$via));
}
header("location:./request_ok.php");
?>


    
</body>
</html>



