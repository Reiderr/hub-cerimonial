<?php
	//será a página do evento em si, redirecionada a partir do eventos.php
	include 'event.php';
	$id = ($_REQUEST['nome']);
	$evento = new Evento($id);


	//exemplos de retorno, os métodos realizam um return com os respectivos dados.
	echo($evento->getNome());
	echo($evento->getId());
	echo($evento->getLocal());
	echo($evento->getUserEmail());
	echo($evento->getLatitude());
	echo($evento->getLongitude());

?>
