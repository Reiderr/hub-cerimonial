<?php
if(isset($_POST['btn-login'])){
  session_start();
  include 'dbconfig.php';
  $con = connectDB();


  $user_email = trim($_POST['email']);
  $user_password = trim($_POST['senha']);
  
  $password = md5($user_password);
  
  // realiza o login do usuário, e verifica se ele é admin ou usário comum
  try{ 
    $stmt = $con->prepare("SELECT * FROM usuario WHERE  email = :email");
    $stmt->bindParam(':email', $user_email);
    $stmt->execute();

  foreach ($stmt as $row) {
    if($row['senha']==$password){
      if ($row['admin'] == true){
        echo "admin";
      }
      else{
        echo "ok"; // log in
      }
    // salva o CPF do usuário logado
    $_SESSION['user_session'] = $row['CPF'];
    }


   else{
    echo "erro"; // wrong details 
   }
 }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
}


?>