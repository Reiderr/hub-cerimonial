<?php
// exemplo de como puxar o link para o php e carregar páginas dinamicamente... exemplo de link : event.php?nome=joaoemaria
// carrega apenas o 'joaoemaria', dai é possivel carregar a página baseada nessa entrada do banco de dados
	include 'assets/backend/dbconfig.php';
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

	// classe para recuperação dos dados do evento, utilizado para carregar a página do evento
	class Evento {

		//declaração de parametros
		private $evento_nome;
		private $evento_id;
		private $evento_local;
		private $evento_listaPresente;
		private $evento_convidados;
		private $user_email;
		private $evento_latitude;
		private $evento_longitude;

		//declaração de métodos
		public function __construct($id){
			//conexão e request
			$con = connectDB();


			//query buscando pelo evento
			$stmt = $con->prepare("SELECT * FROM evento WHERE  url = :url");
			$stmt -> bindParam(':url', $id);
			$stmt -> execute();

			//caso o endereço seja inválido siginifica que a página não existe, erro 404!
			if($stmt->rowCount() == 0){
				header("Location: ../login/404.html");
			}
			// inicializa as variaveis do objeto com os valores buscando do bd
			foreach ($stmt as $row) {
				$this->evento_nome = $row['nomeEvento'];
				$this->evento_id = $row['idEvento'];
				$this->evento_local = $row['local'];
				$this->evento_listaPresente = $row['listaPresente'];
				$this->evento_convidados = $row['convidados'];
				$this->user_email = $row['user_Email'];
				$this->evento_latitude = $row['local_Latitude'];
				$this->evento_longitude = $row['local_Longitude'];
			}
		}
		//métodos gets
		public function getNome(){
			echo $this->evento_nome;
		}

		public function getId(){
			echo $this->evento_id;
		}

		public function getLocal(){
			echo $this->evento_local;
		}

		public function getListaPresente(){
			echo $this->evento_listaPresente;
		}

		public function getConvidados(){
			echo $this->evento_convidados;
		}

		public function getUserEmail(){
			echo $this->user_email;
		}

		public function getLatitude(){
			echo $this->evento_latitude;
		}

		public function getLongitude(){
			echo $this->evento_longitude;
		}

	}




?>