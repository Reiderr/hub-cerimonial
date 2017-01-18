<?php
	include_once "eventCasamento.php";
	if(isset($_POST['salvarCasamento'])){
		$casamento = new Casamento();
		// recebe os dados de atualização do evento
		$id = trim($_POST['url']);
		$texto1 = trim($_POST['mensagem1']);
		$texto2 = trim($_POST['mensagem2']);
		$listaPresentes = trim($_POST['listaPresentes']);


		// atualiza os dados do evento de festa
		$casamento->initCasamentoID($id);
		$casamento->setTexto1($texto1);
		$casamento->setTexto2($texto2);
		$casamento->setlistaPresentes($listaPresentes);
		echo "ok";

}






?>