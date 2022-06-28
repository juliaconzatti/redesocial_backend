<?php

require "classes/clienteClass.php";

try{
    $c = new Cliente();
    $c->setEmail($_POST['email']);
    $c->setUsuario($_POST['usuario']);
    $c->setSenha($_POST['senha']);
    $c->inserir();
    print $c;
}catch(Exception $e) {
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>