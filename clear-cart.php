<?php

$success = true;
$message = 'Cliente cadastrado com sucesso!';

header("Content-Type: application/json");

session_start();

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id_cliente = $_SESSION['cliente_id'] ?? "";

        $sql = "DELETE FROM tb_carrinho WHERE id_cliente = :id_cliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cliente',$id_cliente);
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