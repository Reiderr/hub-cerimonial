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

  $sql = "INSERT INTO evento (nomeEvento, local, listaPresente, convidados, url, local_Latitude, local_Longitude) VALUES ('$nome_evento', '$endereco', '$presentes', '$numero_convidados', '$URL', '$latitude', '$longitude' )";
  $result = mysql_query($sql, $con);

 if (!$result) {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      exit;
  }
      else{
        echo "ok"; // log in
      }
}


?>