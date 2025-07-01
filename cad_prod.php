<?php

$success = true;
$message = 'Produto registrado com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nm_produto = $_POST["nm_produto"] ?? '';
        $desc_produto = $_POST["desc_produto"] ?? '';
        $prod_preco = $_POST["prod_preco"] ?? '';
        $quantidade = $_POST["quantidade"] ?? '';
        $embalagem = $_POST["embalagem"] ?? '';
        $img_prod = null;
        $img_nome = uniqid()."_".basename($_FILES["img_produto"]["name"]);
        $img_prod = $img_nome;
        $caminhoUpload = __DIR__."/upload/".$img_prod;
        if (!move_uploaded_file($_FILES['img_produto']['tmp_name'], $caminhoUpload)) {
            $message = "Erro ao fazer upload da imagem";
            throw new Exception("Erro ao fazer upload da imagem.");  
        };
        if (empty(trim($img_prod))){
            throw new Exception("Imagem não foi definida corretamente");
        };
        

        $sql = "INSERT INTO tb_produto (nm_produto, desc_produto, prod_preco,quant_prod, embalagem,img_produto)
                VALUES (:nm_produto, :desc_produto, :prod_preco, :quant_prod, :embalagem,:img_produto)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nm_produto', $nm_produto);
        $stmt->bindParam(':desc_produto', $desc_produto);
        $stmt->bindParam(':prod_preco', $prod_preco);
        $stmt->bindParam(':quant_prod',$quantidade);
        $stmt->bindParam(':embalagem', $embalagem);
        $stmt->bindParam(':img_produto', $img_prod);
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
        echo json_encode($e->getMessage());
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método não permitido."]);
}
exit;

?>