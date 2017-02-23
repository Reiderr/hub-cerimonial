<?php
	include_once "eventCasamento.php";
	ob_start();
	require 'FirePHPCore/fb.php';

	if(isset($_POST['salvarCasamento'])){
		Fb::info("teste");
		$casamento = new Casamento();
		// recebe os dados de atualização do evento
		$id = trim($_POST['url']);
		$texto1 = trim($_POST['mensagem1']);
		$texto2 = trim($_POST['mensagem2']);
		$listaPresentes = trim($_POST['listaPresentes']);
		$latitude = trim($_POST['latitude']);
		$longitude = trim($_POST['longitude']);
		$local = trim($_POST['endereco']);

		// atualiza os dados do evento de festa
		if ($id != ""){
			$casamento->initCasamentoID($id);
		}
		if ($texto1 != ""){
			$casamento->setTexto1($texto1);
		}
		if ($texto2 != ""){
			$casamento->setTexto2($texto2);
		}
		if ($listaPresentes != ""){
			$casamento->setlistaPresentes($listaPresentes);
		}
		if ($latitude != '-19.9178576'){
			$casamento->setLatitude($latitude);
		}
		if ($longitude != '-44.0303516'){
			$casamento->setLongitude($longitude);
		}
		if ($local != ""){
			$casamento->setLocal($local);
		}
		echo "ok";

}






?>