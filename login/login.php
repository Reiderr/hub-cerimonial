<?php
if(isset($_POST['btn-login'])){
  session_start();
  include 'dbconfig.php';
  $con = connectDB();


  $user_email = trim($_POST['email']);
  $user_password = trim($_POST['senha']);
  
  $password = md5($user_password);
  
  try{ 
  
    $sql = "SELECT * FROM usuario WHERE  '$user_email' = email";
    $result = mysql_query($sql, $con);
    $row = mysql_fetch_array($result);


   
    if($row['senha']==$password){
      if ($row['admin'] == true){
        echo "admin";
      }
      else{
        echo "ok"; // log in
      }
    $_SESSION['user_session'] = $row['nome'];
   }

   else{
    echo "erro"; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
}


?>