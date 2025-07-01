<?php
$success = true;
$message = 'Tabela atualizada com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $id_funcionario = $_POST["id1"];
        $nm_funcionario = $_POST["nm_funcionario"];
        $func_email = $_POST["func_email"];
        $tel_funcionario = $_POST["tel_funcionario"];
        $func_salario = $_POST["func_salario"];

        if (empty($func_email) || empty($tel_funcionario)) {
            throw new Exception("Todos os campos sao obrigatorios.");
        }

        $sql = "UPDATE tb_funcionario SET nm_funcionario = :nm_funcionario, func_email = :func_email, tel_funcionario = :tel_funcionario, 
        func_salario = :func_salario WHERE id_funcionario = :id_funcionario";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nm_funcionario', $nm_funcionario);
        $stmt->bindParam(':func_email', $func_email);
        $stmt->bindParam(':tel_funcionario', $tel_funcionario);
        $stmt->bindParam(':func_salario', $func_salario);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->execute();

        echo json_encode([
            'success' => true,
            'message' => $message
        ]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Erro ao atualizar: " . $e->getMessage()]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Erro de validacao: " . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Metodo nao permitido."]);
}
exit;
?>


