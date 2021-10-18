<?php
declare(strict_types=1);

class Produto {	
	private $conexao;
	
	public function __construct() {
		try {
			$this->conexao = new PDO('mysql:host=127.0.0.1;dbname=fatec', 'userdel', 'senha');
		} catch(Exception $e) {
			echo $e->getMessage();
			die();	
		}		
	}
	public function contar() : int {
		$sql = "SELECT * FROM produtos";
		$prepare = $this->conexao->prepare($sql);
		$prepare->execute();
		return $prepare->rowCount();
	}
	public function contarProdUsuario(int $idUsuario) : int {
		$sql = "SELECT * FROM produtos WHERE idUsuario = {$idUsuario}";
		$prepare = $this->conexao->prepare($sql);
		$prepare->execute();
		return $prepare->rowCount();
	}
	public function listar() : array {
		$sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.idCategoria = categorias.idCategoria";
		$produtos = [];			
		foreach($this->conexao->query($sql) as $key => $value) {
			array_push($produtos, $value);
		}
		return $produtos;
	}
	public function listarProdUsuario(int $idUsuario) : array {
		$sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.idCategoria = categorias.idCategoria WHERE idUsuario = {$idUsuario}";
		$produtos = [];			
		foreach($this->conexao->query($sql) as $key => $value) {
			array_push($produtos, $value);
		}
		return $produtos;
	}
	public function inserir(string $nomeProduto, int $idCategoria, string $descricaoProduto, int $quantidadeProduto, int $idUsuario) : int {
		$sql = "INSERT INTO produtos(nomeProduto,idCategoria,descricaoProduto,quantidadeProduto,idUsuario) VALUES(:nomeProduto, :idCategoria, :descricaoProduto, :quantidadeProduto, :idUsuario)";		
		$prepare = $this->conexao->prepare($sql);	
		$prepare->bindParam(1, $nomeProduto);
		$prepare->bindParam(2, $idCategoria);
		$prepare->bindParam(3, $descricaoProduto);
		$prepare->bindParam(4, $quantidadeProduto);
		$prepare->bindParam(5, $$idUsuario);
		$prepare->execute(array(':nomeProduto' => $nomeProduto, ':idCategoria' => $idCategoria, ':descricaoProduto' => $descricaoProduto, ':quantidadeProduto' => $quantidadeProduto, ':idUsuario' => $idUsuario));	
		return $prepare->rowCount();
	}	
	public function atualizar(string $nomeProduto, int $idCategoria, string $descricaoProduto, int $quantidadeProduto, int $idUsuario, int $idProduto) : int {
		$sql = "UPDATE produtos SET nomeProduto = ?, idCategoria = ?, descricaoProduto = ?, quantidadeProduto = ?, idUsuario = ? WHERE idProduto = ?";		
		$prepare = $this->conexao->prepare($sql);
		$prepare->bindParam(1, $nomeProduto);
		$prepare->bindParam(2, $idCategoria);
		$prepare->bindParam(3, $descricaoProduto);
		$prepare->bindParam(4, $quantidadeProduto);
		$prepare->bindParam(5, $idUsuario);
		$prepare->bindParam(6, $idProduto);
		$prepare->execute();		
		return $prepare->rowCount();
	}	
	public function remover(int $id) : int {
		$sql = "DELETE FROM produtos WHERE idProduto = ?";
		$prepare = $this->conexao->prepare($sql);
		$prepare->bindParam(1, $id);
		$prepare->execute();		
		return $prepare->rowCount();
	}
	public function buscarProduto(string $searchterm) : array {
		$sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.idCategoria = categorias.idCategoria WHERE nomeProduto LIKE '%".$searchterm."%'";
		$produtos = [];			
		foreach($this->conexao->query($sql) as $key => $value) {
			array_push($produtos, $value);
		}
		return $produtos;
	}
	public function contarProdBuscados(string $searchterm) : int {
		$sql = "SELECT * FROM produtos WHERE nomeProduto LIKE '%".$searchterm."%'";
		$prepare = $this->conexao->prepare($sql);
		$prepare->execute();
		return $prepare->rowCount();
	}
}
?>
