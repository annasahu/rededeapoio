<?php
declare(strict_types=1);

class Usuario {	
	private $conexao;
	
	public function __construct() {
		try {
			$this->conexao = new PDO('mysql:host=127.0.0.1;dbname=fatec', 'userdel', 'senha');
		} catch(Exception $e) {
			echo $e->getMessage();
			die();	
		}		
	}
	public function contar_clientes() : int {
		$sql = "SELECT tipoUsuario FROM usuarios WHERE tipoUsuario = 'Cliente'";
		$prepare = $this->conexao->prepare($sql);
		$prepare->execute();
		return $prepare->rowCount();
	}
	public function listar_clientes() : array {
		$sql = "SELECT * FROM usuarios WHERE tipoUsuario = 'Cliente'";
		$usuarios = [];			
		foreach($this->conexao->query($sql) as $key => $value) {
			array_push($usuarios, $value);
		}
		return $usuarios;
	}
	public function inserir(string $nomeUsuario, string $documentoUsuario, string $logradouroUsuario, string $cepUsuario, string $cidadeUsuario, string $estadoUsuario, string $telefoneUsuario, string $emailUsuario, string $senhaUsuario, string $tipoUsuario) : int {
		$sql = "INSERT INTO usuarios(nomeUsuario,documentoUsuario,logradouroUsuario,cepUsuario,cidadeUsuario,estadoUsuario,telefoneUsuario,emailUsuario,senhaUsuario,tipoUsuario) VALUES(:nomeUsuario, :documentoUsuario, :logradouroUsuario, :cepUsuario, :cidadeUsuario, :estadoUsuario, :telefoneUsuario, :emailUsuario, :senhaUsuario, :tipoUsuario)";		
		$prepare = $this->conexao->prepare($sql);
		$prepare->bindParam(1, $nomeUsuario);
		$prepare->bindParam(2, $documentoUsuario);
		$prepare->bindParam(3, $logradouroUsuario);
		$prepare->bindParam(4, $cepUsuario);
		$prepare->bindParam(5, $cidadeUsuario);
		$prepare->bindParam(6, $estadoUsuario);
		$prepare->bindParam(7, $telefoneUsuario);
		$prepare->bindParam(8, $emailUsuario);
		$prepare->bindParam(9, $senhaUsuario);
		$prepare->bindParam(10, $tipoUsuario);
		$prepare->execute(array(':nomeUsuario' => $nomeUsuario, ':documentoUsuario' => $documentoUsuario, ':logradouroUsuario' => $logradouroUsuario, ':cepUsuario' => $cepUsuario, ':cidadeUsuario' => $cidadeUsuario, ':estadoUsuario' => $estadoUsuario, ':telefoneUsuario' => $telefoneUsuario, ':emailUsuario' => $emailUsuario, ':senhaUsuario' => $senhaUsuario, ':tipoUsuario' => $tipoUsuario));	
		return $prepare->rowCount();
	}	
	public function atualizar(string $nomeUsuario, string $logradouroUsuario, string $cepUsuario, string $cidadeUsuario, string $estadoUsuario, string $telefoneUsuario, int $idUsuario) : int {
		$sql = "UPDATE usuarios SET nomeUsuario = ?, logradouroUsuario = ?, cepUsuario = ?, cidadeUsuario = ?, estadoUsuario = ?, telefoneUsuario = ? WHERE idUsuario = ?";		
		$prepare = $this->conexao->prepare($sql);
		$prepare->bindParam(1, $nomeUsuario);
		$prepare->bindParam(2, $logradouroUsuario);
		$prepare->bindParam(3, $cepUsuario);
		$prepare->bindParam(4, $cidadeUsuario);
		$prepare->bindParam(5, $estadoUsuario);
		$prepare->bindParam(6, $telefoneUsuario);		
		$prepare->bindParam(7, $idUsuario);
		$prepare->execute();		
		return $prepare->rowCount();
	}
	public function remover(int $id) : int {
		$sql = "DELETE FROM usuarios WHERE idUsuario = ?";
		$prepare = $this->conexao->prepare($sql);
		$prepare->bindParam(1, $id);
		$prepare->execute();		
		return $prepare->rowCount();
	}
}
?>
