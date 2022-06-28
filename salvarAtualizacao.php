<?php

require "classes/atualizacaoClass.php";

try{
    $a = new Atualizacao();
    $a->setPaginaslidas($_POST['paginaslidas']);
    $a->setTextAtualizacao($_POST['textAtualizacao']);
    $a->inserir();
    print $a;
}catch(Exception $e) {
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>
