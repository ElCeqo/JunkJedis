<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=postgres 
            user=postgres password=admin") 
            or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                $nome = $_POST['inputNome']; 
                $q1="select * from prodotto where nome= $1";
                $result=pg_query_params($dbconn, $q1, array($nome)); 
                $tuple=pg_fetch_array($result, null, PGSQL_ASSOC);
                if ($tuple!=NULL) {
                    $tipo=$tuple['materiale'];
                    if ($tipo=="Carta") {
                        header("location: ./carta.html");
                    }
                    else if ($tipo=="Plastica") {
                        header("location: ./plastica.html");
                    }
                    else if ($tipo=="Organico") {
                        header("location: ./organico.html");
                    }
                    else if ($tipo=="Indifferenziato") {
                        header("location: ./indifferenziato.html");
                    }
                }

                
                else {
                    header("location: ./prod_not_exist.html");
                    }
                }
        ?> 
    </body>
</html>