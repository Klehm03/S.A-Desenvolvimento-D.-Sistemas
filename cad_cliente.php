<?php

$success = true;
$message = 'Cliente cadastrado com sucesso!';

header("Content-Type: application/json");


require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $nm_cliente = $_POST["nm_cliente"] ?? '';
        $cl_email = $_POST["cl_email"] ?? '';
        $cl_senha = $_POST["cl_senha"] ?? '';
        $cl_idade = $_POST["idade"] ?? '';
        $tel_cliente = $_POST["tel_cliente"] ?? '';
        $senha = $_POST["confirmar-senha"] ?? '';


        if (empty(trim($cl_senha)) || empty(trim($cl_email)) || empty(trim($nm_cliente)) || empty(trim($cl_idade)))  {
            throw new Exception("Todos os campos sao obrigatorios.");
        }

        if ($senha !== $cl_senha){
            throw new Exception("Erro ao comfirmar senha");
        }

        if($cl_idade < 18){
            throw new Exception("Idade inapropriada");
        }

        
        if(empty(trim($tel_cliente))){

            $sql = "INSERT INTO tb_clientes (nm_cliente, cl_email,senha,idade)
                VALUES (:nm_cliente, :cl_email,:senha,:idade)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nm_cliente', $nm_cliente);
            $stmt->bindParam(':cl_email', $cl_email);
            $stmt->bindParam(':senha',$cl_senha);
            $stmt->bindParam(':idade',$cl_idade);
            $stmt->execute();

        }
        else{
            $sql = "INSERT INTO tb_clientes (nm_cliente, cl_email, tel_cliente,senha,idade)
                VALUES (:nm_cliente, :cl_email, :tel_cliente,:senha,:idade )";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nm_cliente', $nm_cliente);
            $stmt->bindParam(':cl_email', $cl_email);
            $stmt->bindParam(':tel_cliente', $tel_cliente);
            $stmt->bindParam(':senha',$cl_senha);
            $stmt->bindParam(':idade',$cl_idade);
            $stmt->execute();

        }

        
        
        echo json_encode([
            'success' => $success,
            'message' => $message,
        ]);
        
        
      
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Erro no banco de dados: " . $e->getMessage()]);
    } catch (Exception $e) {
        echo $e -> getMessage();
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método não permitido."]);
}


?>