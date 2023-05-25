<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
           $dbconn = pg_connect("host=localhost port=5432 dbname=Login 
           user=postgres password=admin") 
           or die('Could not connect: ' . pg_last_error()); 
            if ($dbconn) {
                $email = $_POST['inputEmail'];
                $q1 = "select * from utente where email= $1"; //metto il risultato della query in una stringa
                $result = pg_query_params($dbconn, $q1, array($email));
                if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                    header("location: ./email_notused.html");
                }
                else {
                    $password = $_POST['inputPassword']; //Serve per non salvare la password in chiaro
                    $q2 = "select * from utente where email = $1 and paswd = $2";
                    $result = pg_query_params($dbconn, $q2, array($email,$password));
                    if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                        header("location: ./wrong_pswd.html");
                    }
                    else {
                        session_start();
                        $_SESSION['loggato']=true;
                        $_SESSION['nome']=$tuple['nome'];
                        $_SESSION['cognome']=$tuple['cognome'];
                        header("location: ./richiesta.php");
                    }
                }
            }
        ?> 
    </body>
</html>