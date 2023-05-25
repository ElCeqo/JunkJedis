<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=Login 
            user=postgres password=admin") 
            or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                $email = $_POST['inputEmail']; //metodo per prendere un campo dell'array associativo della form
                $q1="select * from utente where email= $1"; //$1 è un placeholder
                $result=pg_query_params($dbconn, $q1, array($email)); // funzione che lancia la query e ha come ultimo parametro un array con le variabili da mettere nei placeholders
                if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) { //funzione che itera tutte le tuple del db e vede se è presente quella richiesta
                   header("location: ./email_used.html");
                         
                }
                else {
                    $nome = $_POST['inputNome'];
                    $cognome = $_POST['inputCognome'];
                    $comune = $_POST['inputComune'];
                    $via = $_POST['inputVia'];
                    $password = $_POST['inputPassword'];
                    $q2 = "insert into utente values ($1,$2,$3,$4,$5,$6)"; //Inserisco una nuova tupla nel db
                    $data = pg_query_params($dbconn, $q2,
                        array($email, $nome, $cognome, $comune,$via,$password));
                    if ($data) {
                        header("location:./reg_ok.html");
                    }
                }
            }
        ?> 
    </body>
</html>