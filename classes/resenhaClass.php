<?php

class Resenha {
    private $id;
    private $tituloresenha = "";
    private $textresenha = "";

    function __toString() {
        return json_encode([
            "id" => $this->id,
            "tituloresenha" => $this->tituloresenha,
            "textresenha" => $this->textresenha
        ]);
    }

    static function findByPk($id) {
        global $_DATABASE; 
        $db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
        $consulta = $db->prepare("SELECT * FROM resenhas WHERE id=:id");
        $consulta->execute([':id' => $id]);
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'Resenha');
        return $consulta->fetch();
    }

    function setpaginaslidas($v) {$this->tituloresenha = $v;}
		function settextAtualizacao($v) {$this->textresenha = $v;}

		function inserir() {
			global $_DATABASE;
			try {
				$db = new PDO("mysql:host={$_DATABASE['HOSTNAME']};dbname={$_DATABASE['DBNAME']}", $_DATABASE['USER'], $_DATABASE['PWD']);
				$consulta = $db->prepare("INSERT INTO resenhas (tituloresenha, textresenha) VALUES (:tituloresenha, :textresenha)");
				$consulta->execute([
					':tituloresenha' => $this->tituloresenha,
					':textresenha' => $this->textresenha,
				]);

				$consulta = $db->prepare("SELECT id FROM resenhas ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $data = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];

        }catch(PDOException $e){
            throw new Exception("Ocorreu um erro interno!");

			}
		}
	}
?>