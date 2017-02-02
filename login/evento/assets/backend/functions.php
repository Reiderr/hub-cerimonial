<?php
include_once 'dbconfig.php';

function iniciarSessao(){
	    // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        session_start();
        if (!isset($_SESSION['user_session'])){
        	header("Location: ../index.html");
        }
        else{
        	return $_SESSION['user_session'];
        }

}

function iniciarSessaoEvento(){// inicia a sessão para a página de evento, verifica caso o evento não seja ativo, exige
	// que o usuário logue em sua conta
	    session_start();
        if (!isset($_SESSION['user_session'])){
        	header("Location: ../../../../index.html");
        }
        else{
        	return $_SESSION['user_session'];
        }
}

function verificaDono($user, $url){// verifica se o dono do evento é o mesmo que está tentando acessa-lo
	include_once 'event.php';
    $evento = new Evento();
    $evento->initEvento($url);
    $user_email = getEmailSessao($user);//recebe email do usuário logado para verificar a integridade do sistema
    if ($user_email != $evento->getUserEmail()){
    	header( "Location: 403.php" );
    }//verifica se o usuário logado é dono do evento
    $evento_id = $evento->getId();
    return $evento_id;	
}

function verificaEventoAtivo($url){// verifica se o evento está ativo, caso esteja qualquer um pode vizualizar
	// caso não esteja, solicita que o usuário logue em sua conta
	include_once('event.php');
	$evento = new Evento();
	$evento->initEvento($url);
	$status = $evento->getStatus();
	if ($status == NULL){
		$user = iniciarSessaoEvento();
		verificaDono($user, $url);
	}
}

function getVersion(){
    echo "alpha 1.1";
}


?>