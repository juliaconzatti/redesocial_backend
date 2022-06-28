<?php

class Atualizacao {
	private $id;
	private $paginaslidas = "";
	private $textAtualizacao = "";

	function __toString() {
		return json_encode ([
			"id" => $this->id,
			"paginaslidas" => $this->paginaslidas,
			"textAtualizacao" => $this->textAtualizacao
		]);
	}

		static function findByPk($id) {
			global $_DATABASE;
			$db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
        	$consulta = $db->prepare("SELECT * FROM atualizacoes WHERE id=:id");
        	$consulta->execute([':id' => $id]);
        	$consulta->setFetchMode(PDO::FETCH_CLASS, 'Atualizacao');
        	return $consulta->fetch();
    }

		function setpaginaslidas($v) {$this->paginaslidas = $v;}
		function settextAtualizacao($v) {$this->textAtualizacao = $v;}

		function inserir() {
			global $_DATABASE;
			try {
				$db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
				$consulta = $db->prepare("INSERT INTO atualizacoes (paginaslidas, textAtualizacao) VALUES (:paginaslidas, :textAtualizacao)");
				$consulta->execute([
					':paginaslidas' => $this->paginaslidas,
					':textAtualizacao' => $this->textAtualizacao,
				]);

				$consulta = $db->prepare("SELECT id FROM atualizacoes ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $data = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];

        }catch(PDOException $e){
            throw new Exception("Ocorreu um erro interno!");

			}
		}
	}

?>