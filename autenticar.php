<?php
    require_once dirname(__FILE__) . "/DB.Class.php";
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . "/key.php";
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    $cliente = $_POST['email'];
    $senha = $_POST['senha'];
    $database = DB::getInstance();
    try {
        
        $consulta = $database->prepare("SELECT id FROM clientes WHERE email=:email and senha =:senha");
        $consulta->execute([":email" => $cliente, ':senha' => $senha]);
        $consulta->setFetchMode(PDO::FETCH_CLASS, "Cliente");
        $dados = $consulta->fetch();
        
        if ($dados === false){
            throw new Exception("Dados inválidos!");
        }

        $jwt = JWT::encode($dados, $key, 'HS256');
        print json_encode(['token' => "Bearer ${jwt}", 'cliente' => ['name' => $dados['usuario']]]);
    } catch(Exception $e){
        die(json_encode(['error' => $e->getMessage()]));
    }

?>