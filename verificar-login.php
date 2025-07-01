<?php

$success = true;
$message = 'Login feito com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        
        if (empty(trim($email)) || empty(trim($senha))) {
            throw new Exception("Nome de usuário e senha são obrigatórios.");
        }
        
        $sql = "SELECT * FROM tb_clientes WHERE cl_email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT * FROM tb_funcionario WHERE func_email = :email";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':email', $email);
        $stmt2->execute();
        $funcionario = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($funcionario || $cliente) {
            if($funcionario){
                if ($senha == $funcionario['func_senha']) {
                    session_start();
                    $_SESSION['funcionario_nome'] = $funcionario['nm_funcionario'];
                    
                }
                else{
                    throw new Exception("Senha incorreta.");
                }
            } else {
                    if ($senha == $cliente['senha']){
                        session_start();
                        $_SESSION['cliente_nome'] = $cliente['nm_cliente'];
                        $_SESSION['cliente_id'] = $cliente['id'];
                        echo json_encode(["success" => true, "tipo" => "cliente"]);
                        exit;
        
                    } else {
                        throw new Exception("Senha incorreta.");
                    }
                }

        }else {
            if($email == 'admin@gmail.com' && $senha == "admin123"){
                session_start();
                $_SESSION['funcionario_nome'] = 'Administrador';
                echo json_encode(["success" => true, "tipo" => "admin"]);
                exit;

            }
        }
        
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