<?php

include 'dbconfig.php';
// realiza o cadastro do usuário, ainda precisa ser vinculado à um javascript
	$con = connectDB();

	$admin = 0;

	$user_CPF = trim($_POST['CPF']);
	$user_nome = trim($_POST['nome']);
	$user_endereco = trim($_POST['endereco']);
	$user_email = trim($_POST['email']);
	$user_telefone = trim($_POST['telefone']);
	$user_senha = md5 (trim($_POST['senha']));

	$stmt = $con->prepare("INSERT INTO usuario (CPF, nome, telefone, endereco, admin, senha, email) VALUES (:user_CPF, :user_nome, :user_telefone, :user_endereco, :admin, :user_senha, :user_email )");
	$stmt-> bindParam(':user_CPF', $user_CPF);
	$stmt-> bindParam(':user_nome', $user_nome);
	$stmt-> bindParam(':user_telefone', $user_telefone);
	$stmt-> bindParam(':user_endereco', $user_endereco);
	$stmt-> bindParam(':admin', $admin);
	$stmt-> bindParam(':user_senha', $user_senha);
	$stmt-> bindParam(':user_email', $user_email);



	if (!$stmt -> execute()) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
	    exit;
	}

	else{
		// Criar aqui uma página de confirmação de cadastro, algo como 'enviar email de confirmação' e após isso retornar para a página de login
		header("Location: ../login/index.html");
	}

    mysql_close($con);
?>
