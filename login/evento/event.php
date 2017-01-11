<?php
// exemplo de como puxar o link para o php e carregar páginas dinamicamente... exemplo de link : event.php?nome=joaoemaria
// carrega apenas o 'joaoemaria', dai é possivel carregar a página baseada nessa entrada do banco de dados
	include 'assets/backend/dbconfig.php';
	$id = ($_REQUEST['nome']);
	$evento = new Evento($id);

	// classe para recuperação dos dados do evento, utilizado para carregar a página do evento
	class Evento {

		//declaração de parametros
		private $evento_nome;
		private $evento_id;
		private $evento_local;
		private $user_email;
		private $evento_latitude;
		private $evento_longitude;
		private $evento_layout;
		private $event_data

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
				header("Location: ../evento/404.html");
			}
			// inicializa as variaveis do objeto com os valores buscando do bd
			foreach ($stmt as $row) {
				$this->evento_nome = $row['nomeEvento'];
				$this->evento_id = $row['idEvento'];
				$this->evento_local = $row['local'];
				$this->evento_data = $row['dataEvento'];
				$this->user_email = $row['user_Email'];
				$this->evento_latitude = $row['local_Latitude'];
				$this->evento_longitude = $row['local_Longitude'];
				$this->evento_layout = $row['layout'];
			}
		}
		//métodos gets
		public function getNome(){
			return $this->evento_nome;
		}

		public function getId(){
			// este id será utilizado para linkar a tabela de mensagens(textos do evento) com a tabela do evento,
			// assim como a tabela de imagens que também será linkada por aqui
			return $this->evento_id;
		}

		public function getLocal(){
			return $this->evento_local;
		}

		public function getListaPresente(){
			return $this->evento_data;
		}

		public function getUserEmail(){
			return $this->user_email;
		}

		public function getLatitude(){
			return $this->evento_latitude;
		}

		public function getLongitude(){
			return $this->evento_longitude;
		}

		public function getLayout(){
			return $this->evento_layout;
		}

	}




?>
