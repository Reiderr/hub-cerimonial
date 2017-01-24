<?php
include "event.php";
// classe Festa que herda os métodos de evento, assim como a classe Casamento fará
class Festa extends Evento{ 
	private $texto1;
	private $texto2;
	private $img1;
	private $img2;
	private $evento_face;
	private $fanpage_face;

	public function __construct(){
		$this->texto1 = NULL;
		$this->texto2 = NULL;
		$this->img1 = NULL;
		$this->img2 = NULL;
		$this->evento_face = NULL;
		$this->fanpage_face = NULL;

	}

	public function initFesta($url){
		parent::initEvento($url);
		$con = connectDB();
		$stmt = $con->prepare('SELECT * FROM dados_evento WHERE evento_ID=:id');
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();

		foreach ($stmt as $row){
			$this->texto1 = $row['texto_1'];
			$this->texto2 = $row['texto_2'];
			$this->img1 = $row['imagem_1'];
			$this->img2 = $row['imagem_2'];
			$this->evento_face = $row['evento_facebook'];
			$this->fanpage_face = $row['fanpage_facebook'];
		}
	}

	public function saveFesta($url){
		parent::initEvento($url);
		$con = connectDB();
		$stmt = $con->prepare('INSERT INTO dados_evento (evento_ID) VALUES (:id_evento)');
		$stmt -> bindParam(':id_evento', parent::getId());
		$stmt -> execute();

	}


	public function initFestaID($id){
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

	public function getEventoFace(){
		return $this->evento_face;
	}

	public function getFanpage(){
		return $this->fanpage_face;
	}

	public function setTexto1($text){
		$this->texto1 = $text;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET texto_1 = :texto1 WHERE evento_ID = :id');
		$stmt-> bindParam (':texto1', $text);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setTexto2($text){
		$this->texto2 = $text;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET texto_2 = :texto2 WHERE evento_ID = :id');
		$stmt-> bindParam (':texto2', $text);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setImg1($img){
		$this->img1 = $img;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET imagem_1 = :img1 WHERE evento_ID = :id');
		$stmt-> bindParam (':img1', $img);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();

	}

	public function setImg2($img){
		$this->img2 = $img;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET imagem_2 = :img2 WHERE evento_ID = :id');
		$stmt-> bindParam (':img2', $img);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setEventoFace($link){
		$this->evento_face = $link;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET evento_facebook = :link WHERE evento_ID = :id');
		$stmt-> bindParam (':link', $link);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}

	public function setFanpage($link){
		$this->fanpage_face = $link;
		$con = connectDB();
		$stmt = $con->prepare('UPDATE dados_evento SET fanpage_facebook = :link WHERE evento_ID = :id');
		$stmt-> bindParam (':link', $link);
		$stmt-> bindParam(':id', parent::getId());
		$stmt-> execute();
	}



}






?>