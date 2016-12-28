<?php
if(isset($_POST['criarEvento'])){
  session_start();
  include '../dbconfig.php';
  $con = connectDB();


  $nome_evento = trim($_POST['nomeEvento']);
  $numero_convidados = trim($_POST['numeroConvidados']);
  $endereco = trim($_POST['endereco']);
  $URL = trim($_POST['URL']);
  $presentes = trim($_POST['presentes']);
  $latitude = trim($_POST['latitude']);
  $longitude = trim($_POST['longitude']);
 
  $stmt = $con->prepare("INSERT INTO evento (nomeEvento, local, listaPresente, convidados, url, local_Latitude, local_Longitude) 
    VALUES (:nome_evento, :endereco, :presentes, :numero_convidados, :URL, :latitude, :longitude )");
  
  $stmt-> bindParam(':nome_evento', $nome_evento);
  $stmt-> bindParam(':endereco', $endereco);
  $stmt-> bindParam(':presentes', $presentes);
  $stmt-> bindParam(':numero_convidados', $numero_convidados);
  $stmt-> bindParam(':URL', $URL);
  $stmt-> bindParam(':latitude', $latitude);
  $stmt-> bindParam(':longitude', $longitude);

 if (!$stmt->execute()) {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
  }
      else{
        echo "ok"; // log in
      }
}


?>