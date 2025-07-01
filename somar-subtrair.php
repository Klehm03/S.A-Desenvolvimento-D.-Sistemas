<?php

$success = true;
$message = 'Cliente cadastrado com sucesso!';

session_start();

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $expressao = $_POST['expressao'];
        $quantidade = $_POST['quantidade'];
        $id_produto = $_POST['id_produto'];
        $id_cliente = $_SESSION['cliente_id'];

        $sql1 = "SELECT * FROM tb_produto WHERE id_produto = :id_produto";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':id_produto',$id_produto);
        $stmt1->execute();
        $preco = $stmt1->fetch(PDO::FETCH_ASSOC);


        if($expressao == "somar"){
            $quantidade += 1;
            $preco_total = $quantidade*$preco['prod_preco'];

            $sql = "UPDATE tb_carrinho SET quant_cart = :quant_cart, preco_cart = :preco_cart
            WHERE id_produto = :id_produto AND id_cliente = :id_cliente";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_produto',$id_produto);
            $stmt->bindParam(':id_cliente',$id_cliente);
            $stmt->bindParam(':quant_cart',$quantidade);
            $stmt->bindParam(':preco_cart',$preco_total);
            $stmt->execute();
        }elseif($expressao == "subtrair"){
            $quantidade -= 1;
            $preco_total = $quantidade*$preco['prod_preco'];

            if($quantidade <= 0){
                $sql = "DELETE FROM tb_carrinho 
                WHERE id_produto = :id_produto AND id_cliente = :id_cliente";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_produto',$id_produto);
                $stmt->bindParam(':id_cliente',$id_cliente);
                $stmt->execute();

            }
            else{
                $sql = "UPDATE tb_carrinho SET quant_cart = :quant_cart, preco_cart = :preco_cart 
                WHERE id_produto = :id_produto AND id_cliente = :id_cliente";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_produto',$id_produto);
                $stmt->bindParam(':id_cliente',$id_cliente);
                $stmt->bindParam(':quant_cart',$quantidade);
                $stmt->bindParam(':preco_cart',$preco_total);
                $stmt->execute();
            }
        }
       
    }catch (Exception $e) {
        $e->getMessage();
    }
}
exit;

?>