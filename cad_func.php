<?php

$success = true;
$message = 'Funcionário cadastrado com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $nm_funcionario = $_POST["nm_funcionario"] ?? '';
        $func_email = $_POST["func_email"] ?? '';
        $tel_funcionario = $_POST["tel_funcionario"] ?? '';
        $func_salario = $_POST["func_salario"] ?? '';
        $dt_nascimento = $_POST["dt_nascimento"] ?? '';
        $func_senha = $_POST["senha"] ?? '';
        $comfirma_senha = $_POST["comfirme-senha"] ?? '';



        if (empty(trim($func_email)) || empty(trim($nm_funcionario)) || empty(trim($func_salario)) || empty(trim($dt_nascimento)) || empty(trim($func_senha)) || empty(trim($comfirma_senha))) {
            throw new Exception("Todos os campos sao obrigatorios.");
        }

        if($func_senha !== $comfirma_senha){
            throw new Exception("Senha nao foi comfirmada corretamente!");
        }

        $sql = "INSERT INTO tb_funcionario (nm_funcionario, func_email, tel_funcionario, func_salario, dt_nascimento,func_senha)
                VALUES (:nm_funcionario, :func_email, :tel_funcionario, :func_salario, :dt_nascimento,:func_senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nm_funcionario', $nm_funcionario);
        $stmt->bindParam(':func_email', $func_email);
        $stmt->bindParam(':tel_funcionario', $tel_funcionario);
        $stmt->bindParam(':func_salario', $func_salario);
        $stmt->bindParam(':dt_nascimento', $dt_nascimento);
        $stmt->bindParam(':func_senha',$func_senha);
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