<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once "conexao.php";
    try{
        $email = $_POST["email"] ?? '';
        $senha = $_POST["senha"] ?? '';
        
        if(empty(trim($senha)) || empty(trim($email))){
            throw new Exception('Preencha todos os campos!');
        }
        
        $sql = "SELECT * FROM tb_clientes WHERE cl_email = :email and senha = :senha";
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":senha", $senha);
        $stmt -> execute();
        $usuario = $stmt -> fetch(PDO::FETCH_ASSOC);
        if($usuario){
            if($usuario['senha'] == $senha){
                session_start();
                $_SESSION["nome"] = $usuario['nm_cliente']; 
                header("Location: ../produtos.php");   
            }
        }
        else{
            throw new Exception("Usuário ou senha inválidos.");
        }
        


    }
    catch(Exception $e){
        echo $e -> getMessage();

    }

}
?>