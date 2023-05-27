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
    $q1="select municipio, oggetto, via, stato from prenotazioni where nome=$1 and cognome=$2";
    $result=pg_query_params($dbconn, $q1, array($name,$surname)); 
    if ($result) {
        $tabella="";
        while($row=pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $tabella.="<tr><td>".$row["municipio"]."</td><td>".$row["oggetto"]."</td><td>".$row["via"]."</td><td>".$row["stato"]."</td></tr>";
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
    <div class="text-center"><h2><u>Raccolta rifiuti ingombranti</u></h2></div>
    <br>
        <form class="text-center" action="./ritiro.php" method="POST" submit="">
        <div class="form-group">
        <h2 class="text-center"><b>Benvenuto <?php echo "$name $surname" ?></b></h2>
        <br>
        <h3 class="text-center"><b>Il tuo Municipio</b></h3>
                <select class="form-control" id="municipio" class="defaultselect" size="1" cols="20" name="inputMuni" required>
                    <option selected="" value="">Seleziona un Municipio</option>
                    <option value="Municipio I"> Municipio I</option>
                    <option value="Municipio II"> Municipio II</option>
                    <option value="Municipio II"> Municipio III</option>
                    <option value="Municipio IV"> Municipio IV</option>
                    <option value="Municipio V"> Municipio V</option>
                    <option value="Municipio VI"> Municipio VI</option>
                    <option value="Municipio VII"> Municipio VII</option>
                    <option value="Municipio VIII"> Municipio VIII</option>
                    <option value="Municipio IX"> Municipio IX</option>
                    <option value="Municipio X"> Municipio X</option>
                    <option value="Municipio XI"> Municipio XI</option>
                    <option value="Municipio XII"> Municipio XII</option>
                    <option value="Municipio XIII"> Municipio XIII</option>
                    <option value="Municipio XIV"> Municipio XIV</option>
                    <option value="Municipio XV"> Municipio XV</option>
                </select>
                <br>
                <h3 class="text-center"><b>Cosa devi buttare?</b></h3>
                    <input id="rifiuto" class="form-control" type="rifiuto" placeholder="Cerca..." name="inputRifiuto" list="listarifiuti" autocomplete="off" required>
                    <datalist id="listarifiuti">
                        <option value="Divano 2 sedute"></option>
                        <option value="Frigorifero a 2 porte"></option>
                        <option value="Divano letto matrimoniale"></option>
                        <option value="Friggitrice"></option>
                        <option value="Lavatrice"></option>
                        <option value="Lavastoviglie"></option>
                        <option value="Forno elettrico"></option>
                        <option value="Scaldabagno"></option>
                        <option value="Armadio"></option>
                        <option value="Computer"></option>
                        <option value="Televisore"></option>
                        <option value="Aspirapolvere"></option>
                        <option value="Condizionatore"></option>
                    </datalist>
                    <br>
                    <h3 class="text-center"><b>Inserisci i dati di ritiro</b></h3>               
                    <input id="via" class="form-control" type="indirizzo" placeholder="Inserisci un indirizzo" name="inputIndirizzo" autocomplete="off" required>
                    <br>
           
             <button type="submit" class="btn btn-primary" >Invia richiesta</button>
             <br>
             <br>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Riepilogo prenotazioni
</button>
<br>
<br>
<a href="./logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
</form>







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Riepilogo prenotazioni di <?php echo "$name $surname" ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Municipio</th>
      <th scope="col">Rifiuto da ritirare</th>
      <th scope="col">Indirizzo selezionato</th>
      <th scope="col">Stato della richiesta</th>
    </tr>
  </thead>
  <tbody>
    <?php echo $tabella ?>
  </tbody>
</table>   
      </div>
    </div>
  </div>
</div>



<!-- Script for Navbar Collapse       see Documentation link: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>







    </body>
</html>
