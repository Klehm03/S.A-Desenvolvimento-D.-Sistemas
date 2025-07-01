<?php

$success = true;
$message = 'Cliente cadastrado com sucesso!';

header("Content-Type: application/json");


require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $id_produto = $_POST["id_produto"] ?? '';
        $id_cliente = $_POST["id_cliente"] ?? '';

        $sql = "SELECT * FROM tb_carrinho WHERE id_produto = :id_produto AND id_cliente = :id_cliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT*FROM tb_produto WHERE id_produto = :id_produto";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':id_produto',$id_produto);
        $stmt2->execute();
        $preco = $stmt2->fetch(PDO::FETCH_ASSOC);

        if($produto){
            $quantidade = $produto['quant_cart'];
            $quantidade += 1;

            $preco_total = $quantidade*$preco['prod_preco'];

            $sql1 = "UPDATE tb_carrinho SET quant_cart = :quant_cart, preco_cart = :preco_cart WHERE id_produto = :id_produto AND id_cliente = :id_cliente";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(':quant_cart', $quantidade);
            $stmt1->bindParam(':id_produto',$produto['id_produto']);
            $stmt1->bindParam(':id_cliente',$produto['id_cliente']);
            $stmt1->bindParam(':preco_cart',$preco_total);
            $stmt1->execute();
            
        }
        else{

            $quantidade = 1;
            $preco_total = $quantidade*$preco['prod_preco'];

            $sql1 = "INSERT INTO tb_carrinho (id_produto, id_cliente,quant_cart,preco_cart) 
            VALUES (:id_produto, :id_cliente,:quant_cart,:preco_cart)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(':id_produto', $id_produto);
            $stmt1->bindParam(':id_cliente', $id_cliente);
            $stmt1->bindParam(':quant_cart',$quantidade);
            $stmt1->bindParam(':preco_cart',$preco_total);
            $stmt1->execute();
            
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
};


?>