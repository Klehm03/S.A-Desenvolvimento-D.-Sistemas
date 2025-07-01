<?php
$success = true;
$message = 'Tabela atualizada com sucesso!';

header("Content-Type: application/json");

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $id_produto = $_POST["id"];
        $nm_produto = $_POST["nm_produto"];
        $desc_produto = $_POST["desc_produto"];
        $prod_preco = $_POST["prod_preco"];
        $quant_produto = $_POST["quant_produto"];
        $embalagem = $_POST["embalagem"];
        $img_prod = null;
        $img_nome = uniqid()."_".basename($_FILES["img_produto"]["name"]);
        $img_prod = $img_nome;
        $caminhoUpload = __DIR__."/upload/".$img_prod;

        if (empty(trim($img_prod))){
            throw new Exception("sem nome");
        };
        
        if (!move_uploaded_file($_FILES['img_produto']['tmp_name'], $caminhoUpload)) {
            throw new Exception("Erro ao fazer upload da imagem.");
        };

        $sql = "UPDATE tb_produto SET nm_produto = :nm_produto, desc_produto = :desc_produto, prod_preco = :prod_preco, 
        quant_prod = :quant_produto, embalagem = :embalagem, img_produto = :img_produto WHERE id_produto = :id_produto";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nm_produto', $nm_produto);
        $stmt->bindParam(':desc_produto', $desc_produto);
        $stmt->bindParam(':prod_preco', $prod_preco);
        $stmt->bindParam(':quant_produto', $quant_produto);
        $stmt->bindParam(':embalagem', $embalagem);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->bindParam(':img_produto',$img_prod);
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