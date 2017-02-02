<?php
// classe Festa que herda os métodos de evento, assim como a classe Casamento fará
include_once ('event.php');
class Casamento extends Evento{ 
	private $texto1;
	private $texto2;
	private $img1;
	private $img2;
	private $lista_presentes;


	public function __construct(){
		$this->texto1 = NULL;
		$this->texto2 = NULL;
		$this->img1 = NULL;
		$this->img2 = NULL;
		$this->evento_face = NULL;
		$this->fanpage_face = NULL;
		$this->lista_presentes = NULL;

	}

	public function initCasamento($url){
		parent::initEvento($url);
		$con = connectDB();
		$stmt = $con->prepare('SELECT * FROM dados_casamento WHERE evento_ID=:id');
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();

		foreach ($stmt as $row){
			$this->texto1 = $row['texto_1'];
			$this->texto2 = $row['texto_2'];
			$this->img1 = $row['imagem_1'];
			$this->img2 = $row['imagem_2'];
			$this->lista_presentes = $row['lista_presentes'];
		}
	}

	public function saveCasamento($url){
		parent::initEvento($url);
		$con = connectDB();
		$stmt = $con->prepare('INSERT INTO dados_casamento (evento_ID) VALUES (:id_evento)');
		$stmt -> bindParam(':id_evento', parent::getId());
		$stmt -> execute();

	}

	public function initCasamentoID($id){
		$con = connectDB();
		$stmt = $con->prepare('SELECT url FROM evento WHERE idEvento=:id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		foreach ($stmt as $row){
			parent::initEvento($row['url']);
		}
	}

	public function getTexto1(){
		return $this->texto1;
	}

	public function getTexto2(){
		return $this->texto2;
	}

	public function getImg1(){
		return $this->img1;
	}

	public function getImg2(){
		return $this->img2;
	}

	public function getListaPresente(){
		return $this->lista_presentes;
	}


	public function setTexto1($text){
		$this->texto1 = $text;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_casamento SET texto_1 = :texto1 WHERE evento_ID = :id');
		$stmt-> bindParam (':texto1', $text);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setTexto2($text){
		$this->texto2 = $text;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_casamento SET texto_2 = :texto2 WHERE evento_ID = :id');
		$stmt-> bindParam (':texto2', $text);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setImg1($img){
		$this->img1 = $img;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_casamento SET imagem_1 = :img1 WHERE evento_ID = :id');
		$stmt-> bindParam (':img1', $img);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();

	}

	public function setImg2($img){
		$this->img2 = $img;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_casamento SET imagem_2 = :img2 WHERE evento_ID = :id');
		$stmt-> bindParam (':img2', $img);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setListaPresentes($link){
		$this->lista_presentes = $link;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_casamento SET lista_presentes = :link WHERE evento_ID = :id');
		$stmt-> bindParam (':link', $link);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}




}






?>