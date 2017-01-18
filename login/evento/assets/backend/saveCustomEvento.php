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

		// atualiza os dados do evento de festa
		$festa->initFestaID($id);
		$festa->setTexto1($texto1);
		$festa->setTexto2($texto2);
		$festa->setEventoFace($event_facebook);
		$festa->setFanpage($fanpage_facebook);
		echo "ok";

}






?>