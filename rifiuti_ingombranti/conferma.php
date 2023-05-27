<?php
session_start();
if (!isset($_SESSION['loggato'])||$_SESSION['loggato']!==true) {
    header("location:./login_index.html");
}
$name=$_SESSION['nome'];
$surname=$_SESSION['cognome'];
$municipio=$_GET['municipio'];
$oggetto=$_GET['oggetto'];
$via=$_GET['via'];
echo "$via";
$dbconn = pg_connect("host=localhost port=5432 dbname=Login 
user=postgres password=admin") 
or die('Could not connect: ' . pg_last_error());
if ($dbconn) {
        $conferma="Confermata";
        $q5="update prenotazioni set stato='$conferma' where municipio=$1 and oggetto=$2 and via=$3";
        $result=pg_query_params($dbconn, $q5, array($municipio,$oggetto,$via));
        if ($result) {
            header("location:./comune.php");
            exit;
        }

    }

?>