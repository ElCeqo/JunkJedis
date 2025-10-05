<?php
session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (!isset($_SESSION['loggato'])||$_SESSION['loggato']!==true) {
    header("location:./login_index.html");
}
$name=$_SESSION['nome'];
$surname=$_SESSION['cognome'];
$municipio=$_GET['municipio'];
$oggetto=$_GET['oggetto'];
$via=$_GET['via'];
echo $via;
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres 
user=postgres password=admin") 
or die('Could not connect: ' . pg_last_error());
if ($dbconn) {
        $conferma="Confermata";
        $q5="update prenotazioni set stato='$conferma' where municipio=$1 and oggetto=$2 and via=$3";
        $result=pg_query_params($dbconn, $q5, array($municipio,$oggetto,$via));
        $qEmail = "SELECT email,nome,cognome FROM prenotazioni WHERE municipio=$1 AND oggetto=$2 AND via=$3";
        $resEmail = pg_query_params($dbconn, $qEmail, array($municipio, $oggetto, $via));
        $row = pg_fetch_assoc($resEmail);
        $email_destinatario = $row['email'];
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        

        

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'iovine380@gmail.com';
            $mail->Password   = 'iqkk nnac eigk tflq';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('iovine380@gmail.com', 'Roma Capitale');
            $mail->addAddress($email_destinatario, ' '.$nome.' '.$cognome.'');

            $mail->isHTML(true);
            $mail->Subject = 'Conferma ritiro';
            $mail->Body    = 'Ciao '.$nome.' '.$cognome. '! Ti confermiamo la richiesta di ritiro del prodotto '.$oggetto.' in '.$via.', ti invieremo una ulteriore mail con informazioni sulla data e orario del ritiro.';
            $mail->AltBody = 'Ciao! Questa è una mail inviata automaticamente.';

            $mail->send();
            echo 'Mail inviata con successo';
        } catch (Exception $e) {
            echo "Errore: {$mail->ErrorInfo}";
        }
        if ($result) {
            header("location:./comune.php");
            exit;
        }

    }

?>
