<?php

  
    require_once "conexao.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id1'];
        $nome = $_POST['nome1'];

        if($nome == 'produto'){

            $sql1 = "DELETE FROM tb_produto WHERE id_produto = :id";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1 -> bindParam(":id", $id);
            $stmt1 -> execute();
            exit;
        }

        if($nome == 'funcionario'){
            $sql = "DELETE FROM tb_funcionario WHERE id_funcionario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindParam(":id", $id);
            $stmt -> execute();
            exit;
        }

    }
    


?>