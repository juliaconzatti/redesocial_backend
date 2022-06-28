<?php

require dirname(__FILE__) . "/../config.php";

class Cliente {
	private $id;
	private $email = "";
	private $usuario = "";
	private $senha = "";

	function __toString() {
		return json_encode ([
			"id" => $this->id,
			"email" => $this->email,
			"usuario" => $this->usuario,
			"senha" => $this->senha
		]);
	}

		static function findByPk($id) {
			global $_DATABASE;
			$db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
        	$consulta = $db->prepare("SELECT * FROM clientes WHERE id=:id");
        	$consulta->execute([':id' => $id]);
        	$consulta->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        	return $consulta->fetch();
    }

		function setEmail($v) {$this->email = $v;}
		function setUsuario($v) {$this->usuario = $v;}
		function setSenha($v) {$this->senha = $v;}

		function inserir() {
			global $_DATABASE;
			try {
				$db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
				$consulta = $db->prepare("INSERT INTO clientes (email, usuario, senha) VALUES (:email, :usuario, :senha)");
				$consulta->execute([
					':email' => $this->email,
					':usuario' => $this->usuario,
					':senha' => $this->senha
				]);

				$consulta = $db->prepare("SELECT id FROM clientes ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $data = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];

        }catch(PDOException $e){
            throw new Exception("Ocorreu um erro interno!");

			}
		}

		//Usuário pode excluir a conta? 
	}

?>