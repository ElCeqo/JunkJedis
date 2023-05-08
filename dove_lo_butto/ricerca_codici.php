<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=Login 
            user=postgres password=admin") 
            or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                $codice = $_POST['inputCodice']; 
                $q1="select * from prodotto where codice= $1";
                $result=pg_query_params($dbconn, $q1, array($codice)); 
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                if ($tuple!=NULL) {
                    $tipo=$tuple['materiale'];
                    if ($tipo=="carta") {
                        header("location: ./carta.html");
                    }
                    else if ($tipo=="plastica") {
                        header("location: ./plastica.html");
                    }
                    else if ($tipo=="organico") {
                        header("location: ./organico.html");
                    }
                    else if ($tipo=="indifferenziato") {
                        header("location: ./indifferenziato.html");
                    }
                }

                
                else {
                    echo "Il prodotto non è presente.";
                    }
                }
        ?> 
    </body>
</html>