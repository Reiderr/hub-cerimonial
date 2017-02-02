<?php 
include_once "dbconfig.php";



class usuario{
	private $nome;
	private $cpf;
	private $endereco;
	private $telefone;
	private $email;


	public function __construct ($cpf){
		$this->cpf = $cpf;

		$con = connectDB();
		$stmt = $con->prepare("SELECT * FROM usuario WHERE CPF = :cpf");
		$stmt->bindParam(':cpf', $cpf);
		$stmt->execute();

		if($stmt->rowCount() == 0){
				header("Location: ../evento/404.html");
		}

		foreach($stmt as $row){
			$this->nome = $row['nome'];
			$this->telefone = $row['telefone'];
			$this->endereco = $row['endereco'];
			$this->email = $row['email'];
		}
	}

	public function getNome(){
		return $this->nome;
	}

	public function getCPF(){
		return $this->cpf;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setNome($nome){
		$con = connectDB();
		$stmt = $con->prepare("UPDATE usuario SET nome = :nome WHERE CPF = :cpf");
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->execute();
	}

	public function setEmail($email){
		$con = connectDB();
		$stmt = $con->prepare("UPDATE usuario SET email = :email WHERE CPF = :cpf");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->execute();
	}

	public function setEndereco($endereco){
		$con = connectDB();
		$stmt = $con->prepare("UPDATE usuario SET endereco = :endereco WHERE CPF = :cpf");
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->execute();
	}

	public function setTelefone($telefone){
		$con = connectDB();
		$stmt = $con->prepare("UPDATE usuario SET telefone = :telefone WHERE CPF = :cpf");
		$stmt->bindParam(':telefone', $telefone);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->execute();
	}



}






?>