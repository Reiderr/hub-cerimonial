# hub-cerimonial


# Oganização de arquivos:
Pasta Evento:
	dasboard.php : será a página inicial
	criarEvento.php : página para a criação dos eventos
	customCasamento.php : edita as informações de uma página de casamento
	customEvento.php : edita as informações de uma página de casamento
	eventos.php : página de acesso para as páginas prontas
	tipoEvento.php : seleciona o tipo do evento que será criado, ainda precisa de edições, transita para a página criarEvento
	meusEventos.php : vizualizar todos os eventos criados por uma pessoa (precisa de acabamento e customização)
	blankpage.php : página em branco para criação de novas páginas

	Pasta Assets:

		Pasta Backend:

			client.php : arquivos com a classe cliente
			dbconfig.php : função para conexão com o banco de dados
			event.php : arquivo com a classe evento
			eventCasamento.php : arquivo com a classe casamento
			eventFesta.php : arquivo com a classe festa
			saveCustomEvento.php : responsavel por persistir as informações da página customEvento
			saveCustomCasamento.php : responsável por persistir as informações da página customCasamento
			saveEvento.php : responsável por persistir os dados da página criarEvento.php

		Pasta js:

			evento.js : gerencia os campos de criarEvento.php e chama saveEvento.php
			festa.js : gerencia os campos de customEvento.php e chama saveCusomEvento.php
			casamento.js : gerencia os campos de customCasamento.php e chama saveCustomCasamento.php
			maps.js : gerencia a API do google maps para customEvento e customCasamento

		Pasta Layouts:

			Pasta layout#: (para criar novos layouts basta seguir este padrão)

				layout#festa : carrega a página de layout para um evento (festa)

				layout#casamento : carrega a página de layout para um casamento



	
