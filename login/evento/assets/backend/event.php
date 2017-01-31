<?php
// exemplo de como puxar o link para o php e carregar páginas dinamicamente... exemplo de link : eventos.php?nome=joaoemaria
// carrega apenas o 'joaoemaria', dai é possivel carregar a página baseada nessa entrada do banco de dados
	include_once ('dbconfig.php');
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
		private $evento_data;
		private $tipo_evento;

		//declaração de métodos
		public function __construct(){
				$this->evento_nome = NULL;
				$this->evento_id = NULL;
				$this->evento_local = NULL;
				$this->evento_data = NULL;
				$this->user_email = NULL;
				$this->evento_latitude = NULL;
				$this->evento_longitude = NULL;
				$this->evento_layout = NULL;
				$this->tipo_evento = NULL;
		}
		public function initEvento($id){
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
				$this->evento_data = $row['data_evento'];
				$this->user_email = $row['user_Email'];
				$this->evento_latitude = $row['local_Latitude'];
				$this->evento_longitude = $row['local_Longitude'];
				$this->evento_layout = $row['layout'];
				$this->tipo_evento = $row['tipo_evento'];
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

		public function getDataEvento(){
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

		public function getTipoEvento(){
			return $this->tipo_evento;
		}

		public function setLatitude($latitude){
			$con = connectDB();
			$stmt = $con->prepare("UPDATE evento SET local_Latitude = :latitude WHERE idEvento = :eventoID");
			$stmt->bindParam(':latitude', $latitude);
			$stmt->bindParam(':eventoID', $this->evento_id);
			$stmt->execute();
		}

		public function setLongitude($longitude){
			$con = connectDB();
			$stmt = $con->prepare("UPDATE evento SET local_Longitude= :longitude WHERE idEvento = :eventoID");
			$stmt->bindParam(':longitude', $longitude);
			$stmt->bindParam(':eventoID', $this->evento_id);
			$stmt->execute();

		}

		public function setLayout($layout){
			$con = connectDB();
			$stmt = $con->prepare("UPDATE evento SET layout= :layout WHERE idEvento = :eventoID");
			$stmt->bindParam(':layout', $layout);
			$stmt->bindParam(':eventoID', $this->evento_id);
			$stmt->execute();

		}

		public function setLocal($local){
			$con = connectDB();
			$stmt = $con->prepare("UPDATE evento SET local= :local WHERE idEvento = :eventoID");
			$stmt->bindParam(':local', $local);
			$stmt->bindParam(':eventoID', $this->evento_id);
			$stmt->execute();

		}


	}




?>
