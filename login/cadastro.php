<?php

include 'dbconfig.php';

	$con = connectDB();

	$admin = 0;

	$user_CPF = trim($_POST['CPF']);
	$user_nome = trim($_POST['nome']);
	$user_endereco = trim($_POST['endereco']);
	$user_email = trim($_POST['email']);
	$user_telefone = trim($_POST['telefone']);
	$user_senha = md5 (trim($_POST['senha']));


	$sql = "INSERT INTO usuario (CPF, nome, telefone, endereco, admin, senha, email) VALUES ('$user_CPF', '$user_nome', '$user_telefone', '$user_endereco', '$admin', '$user_senha', '$user_email' )";
	$result = mysql_query($sql, $con);

	if (!$result) {
	    echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
	    exit;
	}

	else{
		// Criar aqui uma página de confirmação de cadastro, algo como 'enviar email de confirmação' e após isso retornar para a página de login
		header("Location: /login/index.html");
	}


	/* EXEMPLO DE COMO FAZER UMA QUERY PARA RESOLVER A CRIPTOGRAFIA
	$pass = md5('147852');
	$sql = "SELECT nome FROM usuario WHERE  '$pass' = senha";
	$result = mysql_query($sql, $con);
	while($row = mysql_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
            echo "</tr>";
        }
	*/

    mysql_close($con);
?>