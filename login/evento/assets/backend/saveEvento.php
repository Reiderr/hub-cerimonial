<?php
if(isset($_POST['criarEvento'])){
  //iniciar sessão
  session_start();
  $user = $_SESSION['user_session'];

 //conexão com o banco de dados
  include 'dbconfig.php';
  $con = connectDB();
  //recuepera o email do usuário logado para vincular ao evento
  $user_logado = getEmailSessao($user);


  $nome_evento = trim($_POST['nomeEvento']);
  $numero_convidados = trim($_POST['numeroConvidados']);
  $endereco = trim($_POST['endereco']);
  $URL = trim($_POST['URL']);
  $presentes = trim($_POST['presentes']);
  $latitude = trim($_POST['latitude']);
  $longitude = trim($_POST['longitude']);
  $layout = '1';//alterar para entrada dinâmica antes da produção, incluir um formulário para escolha do layout!
 
 //query para criação do evento
  $stmt = $con->prepare("INSERT INTO evento (nomeEvento, local, listaPresente, convidados, url, user_Email, local_Latitude, local_Longitude, layout) 
    VALUES (:nome_evento, :endereco, :presentes, :numero_convidados, :URL, :email_logado, :latitude, :longitude, :layout )");
  
  $stmt-> bindParam(':nome_evento', $nome_evento);
  $stmt-> bindParam(':endereco', $endereco);
  $stmt-> bindParam(':presentes', $presentes);
  $stmt-> bindParam(':numero_convidados', $numero_convidados);
  $stmt-> bindParam(':URL', $URL);
  $stmt-> bindParam(':latitude', $latitude);
  $stmt-> bindParam(':longitude', $longitude);
  $stmt-> bindParam(':email_logado', $user_logado);
  $stmt-> bindParam(':layout', $layout);

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