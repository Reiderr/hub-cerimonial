<?php
	include "eventFesta.php";
	if(isset($_POST['salvarDados'])){
		$festa = new Festa();
		// recebe os dados de atualização do evento
		$id = trim($_POST['url']);
		$texto1 = trim($_POST['mensagem1']);
		$texto2 = trim($_POST['mensagem2']);
		$event_facebook = trim($_POST['eventFacebook']);
		$fanpage_facebook = trim($_POST['fanpageFacebook']);
		$latitude = trim($_POST['latitude']);
		$longitude = trim($_POST['longitude']);
		$local = trim($_POST['endereco']);

		// atualiza os dados do evento de festa
		if ($id != ""){
			$festa->initFestaID($id);
		}
		if ($texto1 != ""){
			$festa->setTexto1($texto1);
		}
		if ($texto2 != ""){
			$festa->setTexto2($texto2);
		}
		if ($event_facebook != ""){
			$festa->setEventoFace($event_facebook);
		}
		if ($fanpage_facebook != ""){
			$festa->setFanpage($fanpage_facebook);
		}
		if ($latitude != '-19.9178576'){
			$festa->setLatitude($latitude);
		}
		if ($longitude != '-44.0303516'){
			$festa->setLongitude($longitude);
		}
		if ($local != ""){
			$festa->getLocal($local);
		}
		echo "ok";

}






?>