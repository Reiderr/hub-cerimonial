<?php // realiza o logout da sessão
	session_start();
	unset($_SESSION['user_session']);
	if(session_destroy()){
		header("Location: ../../../index.html");
	}


?>