<?php
session_start();
if (!isset($_SESSION['loggato'])||$_SESSION['loggato']!==true) {
    header("location:./login_index.html");
}
$name=$_SESSION['nome'];
$surname=$_SESSION['cognome'];
$dbconn = pg_connect("host=localhost port=5432 dbname=Login 
user=postgres password=admin") 
or die('Could not connect: ' . pg_last_error());
if ($dbconn) {
    $q1="select nome, cognome, municipio, oggetto, via, stato from prenotazioni";
    $result=pg_query_params($dbconn, $q1, array()); 
    if ($result) {
        $tabella="";
        while($row=pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $tabella.="<tr><td>".$row["nome"]."</td><td>".$row["cognome"]."</td><td>".$row["municipio"]."</td><td>".$row["oggetto"]."</td><td>".$row["via"]."</td><td>".$row["stato"]."</td><td><a class='btn btn-primary btn-sm' href='./conferma.php?municipio=".$row["municipio"]."&oggetto=".$row["oggetto"]."&via=".$row["via"]."'>Conferma</a></td><td><a class='btn btn-danger btn-sm' href='./respingi.php?municipio=".$row["municipio"]."&oggetto=".$row["oggetto"]."&via=".$row["via"]."'>Respingi</a></tr>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../stile.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


    <title>JunkJedis</title>
    
</head>

<body >
    
    <nav class="navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand mb-0 h1">
            <img class= "d-inline-block align-top" src="../images/logo_ok.webp" width="50" height="30">
            JunkJedis
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div
            class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav light mx-auto w-100" style="background-color: #e3f2fd;">
                <li class="nav-item active mx-auto">
                    <a href="../index.html" class="nav-link">
                        Come funziona
                    </a>
                </li>
                <li class="nav-item active mx-auto">
                    <a href="../dove_lo_butto/ricerca.html" class="nav-link">
                        Dove lo butto
                    </a>
                </li>
                <li class="nav-item active mx-auto">
                    <a href="../rifiuti_ingombranti/login_index.html" class="nav-link disabled">
                        Raccolta rifiuti ingombranti
                    </a>
                </li>
                <li class="nav-item active mx-auto">
                    <a href="../calendari/scelta.html" class="nav-link">
                        Calendari raccolta rifiuti
                    </a>
                </li>
            </ul>    
        </div>        
    </nav>
    <div class="text-center"><h2><u>Raccolta rifiuti ingombranti</u></h2>
    <br>
    <div class="box_comune">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th scope="col">Municipio</th>
      <th scope="col">Rifiuto da ritirare</th>
      <th scope="col">Indirizzo selezionato</th>
      <th scope="col">Stato della richiesta</th>
      <th scope="col"></th>
      <th scope="col"></th>


    </tr>
  </thead>
  <tbody>
    <?php echo $tabella ?>
  </tbody>
</table>
</div>
<br>
<br>
<a href="./logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
</div>
<!-- Script for Navbar Collapse       see Documentation link: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>







    </body>
</html>
