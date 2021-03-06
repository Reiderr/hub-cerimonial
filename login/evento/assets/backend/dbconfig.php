<?php
// cria uma conexão com o banco de dados
 function connectDB(){
	if (!$link = new PDO('mysql:host=localhost;dbname=evento', 'root', '')) {
	    echo 'Could not connect to mysql';
	    exit;
	}
	$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $link;
}

//recupera o nome do usuário logado para a sessão
 function getNomeSessao($user){
 	$con = connectDB();
 	$stmt = $con->prepare("SELECT nome FROM usuario WHERE CPF = $user");
 	$stmt->execute();

 	foreach ($stmt as $row){
 		return $row['nome'];
 	}
 }
// recupera o email do usuário logado na sessão 
 function getEmailSessao($user){
 	$con = connectDB();
 	$stmt = $con->prepare("SELECT email FROM usuario WHERE CPF = $user");
 	$stmt->execute();

 	foreach ($stmt as $row){
 		return $row['email'];
 	}
 }

 function getTipoUsuario($user){
 	$con = connectDB();
 	$stmt = $con->prepare("SELECT admin FROM usuario WHERE CPF = $user");
 	$stmt->execute();

 	foreach ($stmt as $row){
 		return $row['admin'];
 	}
 }


?>
