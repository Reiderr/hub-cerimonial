<?php
include_once 'dbconfig.php';

function iniciarSessao(){
	    // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        session_start();
        if (!isset($_SESSION['user_session'])){
        	header("Location: ../index.html");
        }
        if (getTipoUsuario($_SESSION['user_session']) != 1 ){
            session_destroy();
            header("Location: ../index.html");
        }
        else{
        	return $_SESSION['user_session'];
        }

}

function getVersion(){
    echo "alpha 1.1";
}


?>