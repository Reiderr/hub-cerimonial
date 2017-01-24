<?php
	//será a página do evento em si, redirecionada a partir do eventos.php
	include '../backend/eventCasamento.php';
	$id = ($_REQUEST['nome']);
	$evento = new Casamento();
	$evento->initCasamento($id);


	//exemplos de retorno, os métodos realizam um return com os respectivos dados.
	echo($evento->getNome());
	echo($evento->getId());
	echo($evento->getLocal());
	echo($evento->getUserEmail());
	echo($evento->getLatitude());
	echo($evento->getLongitude());
	echo($evento->getTipoEvento());
	echo($evento->getDataEvento());
	echo($evento->getTexto1());

?>
