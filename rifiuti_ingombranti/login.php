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
                    echo "<h1>Questo indirizzo email non è associato a nessun account, clicca</h1>
                        <a href=../registrazione/registrazione_index.html> qui </a> per registrarti";
                }
                else {
                    $password = $_POST['inputPassword']; //Serve per non salvare la password in chiaro
                    $q2 = "select * from utente where email = $1 and paswd = $2";
                    $result = pg_query_params($dbconn, $q2, array($email,$password));
                    if (!($tuple=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                        echo "<h1> La password e' errata! </h1>
                            Clicca <a href=login.html> qui </a> per provare ad accedere di nuovo";
                    }
                    else {
                        $nome = $tuple['nome']; //Prende il nome dall'array associativo ricavato dal db
                        echo "Benvenuto $nome, clicca <a href=./richiesta.html> qui </a> 
                            per inoltrare la tua richiesta di ritiro";
                    }
                }
            }
        ?> 
    </body>
</html>