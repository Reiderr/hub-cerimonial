<?php
	// exemplo de como puxar o link para o php e carregar páginas dinamicamente... exemplo de link : eventos.php?nome=joaoemaria
	// carrega apenas o 'joaoemaria', dai é possivel carregar a página baseada nessa entrada do banco de dados

	// arquivo responsável por selecionar o layout em que a página do cliente será exibida
	include 'assets/backend/event.php';

	$id = ($_REQUEST['nome']);
	$layout = new Evento($id);
	$tipo_layout = $layout->getLayout();

	// redireciona os dados do evento para o layout escolhido pelo cliente!
	// para isso basta adicionar os layouts na pasta com o nome layout1, layout2...
	header("Location: ../evento/assets/layouts/layout$tipo_layout.php?nome=$id");



?>
