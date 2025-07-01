<?php

$success = true;
$message = 'Cliente cadastrado com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $nm_cliente = $_POST["nm_cliente"] ?? '';
        $cl_email = $_POST["cl_email"] ?? '';
        $tel_cliente = $_POST["tel_cliente"] ?? '';
        $cep_cliente = $_POST["cep_cliente"] ?? '';


        if (empty($tel_cliente) || empty($cl_email)) {
            throw new Exception("Todos os campos sao obrigatorios.");
        }

        $sql = "INSERT INTO tb_clientes (nm_cliente, cl_email, tel_cliente, cep_cliente)
                VALUES (:nm_cliente, :cl_email, :tel_cliente, :cep_cliente)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nm_cliente', $nm_cliente);
        $stmt->bindParam(':cl_email', $cl_email);
        $stmt->bindParam(':tel_cliente', $tel_cliente);
        $stmt->bindParam(':cep_cliente', $cep_cliente);
        $stmt->execute();
        
        echo json_encode([
            'success' => $success,
            'message' => $message
        ]);
      
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Erro no banco de dados: " . $e->getMessage()]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método não permitido."]);
}
exit;

?>