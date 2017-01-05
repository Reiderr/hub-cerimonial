<?php
	//será a página do evento em si, redirecionada a partir do eventos.php
	include 'event.php';
	$id = ($_REQUEST['nome']);
	$evento = new Evento($id);


	//exemplos de retorno, os métodos realizam um echo com os respectivos dados, podemos atualizar para um return caso seja necessário!
	$evento->getNome();
	$evento->getId();
	$evento->getLocal();
	$evento->getListaPresente();
	$evento->getConvidados();
	$evento->getUserEmail();
	$evento->getLatitude();
	$evento->getLongitude();

?>