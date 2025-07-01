

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHRONO - Carrinho de Compras</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="navbar beige-navbar">
        <div class="container">
            <div class="logo">CHRONO</div>
            <nav class="nav-icons">
                <a href="areacliente.php">Voltar ao Catálogo</a>
                <a href="logout.php"><img src="img/usuario.png" alt="Login Icone"></a>
                <a href="carrinho.php"><img src="img/carrinho.png" alt="Carrinho Icone"></a>
            </nav>
        </div>
    </header>

    <main class="cart-page">
        <div class="container cart-content">
            <div class="cart-header">
                <h2>Carrinho de compras</h2>
                <p class="total-price" id="total-price"><?php
                    require_once "conexao.php"; 
                    session_start();
                    $cliente = $_SESSION['cliente_id'] ?? "";
                    $sql1 = 'SELECT SUM(preco_cart) AS total FROM tb_carrinho WHERE id_cliente = :id_cliente';
                    $stmt1 =  $pdo->prepare($sql1);
                    $stmt1->bindParam(':id_cliente', $cliente);
                    $stmt1->execute();
                    $preco = $stmt1->fetch(PDO::FETCH_ASSOC);
                    $preco_total = $preco['total'];
                    echo $preco_total;
                    

                    
                    

                    
                ?></p>
            </div>

            

            <div id="cart-itemm-container">
                <?php
                

                try{
                    
                    
                    $sql = 'SELECT * FROM tb_carrinho WHERE id_cliente = :id_cliente';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id_cliente', $cliente);
                    $stmt->execute();
                    $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if($carrinho){
                        foreach($carrinho as $produto){
                            $sql2 = 'SELECT * FROM tb_produto WHERE id_produto = :id_produto';
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->bindParam(':id_produto', $produto['id_produto']);
                            $stmt2->execute();
                            $prod = $stmt2->fetch(PDO::FETCH_ASSOC);
                            if($prod){
                                echo '<div class="card-cart">';
                                    echo "<img src='upload/".$prod['img_produto']."' alt='Imagem do carrrinho'>";
                                    echo '<div class="card-info-cart">';
                                        echo '<h2>'.$prod['nm_produto'].'</h2>';
                                        echo '<p>'.$prod['desc_produto'].'</p>';
                                        echo '<p>Quantidade: '.$produto['quant_cart'].'
                                                    <button class="somar" name="'.$prod["id_produto"].'" value="'.$produto['quant_cart'].'">+</button>
                                                    <button class="subtrair" name="'.$prod["id_produto"].'" value="'.$produto['quant_cart'].'">-</button>
                                              </p>';
                                        echo '<p class="price">R$ '.$prod['prod_preco'].'</p>';
                                        
                                    echo '</div>';
    
                                echo '</div>';
                            }
    
                        }
                    
                    }else{
                        echo '<h2>Nenhum Produto no Carrinho</h2>';
                    }

                }
                catch(Exception $e){
                    $e -> getMessage();
                }
                ?>
                
            </div>
            
            <div class="btn-container">
                <div class="clear-cart">
                    <button class="btn-clear">Limpar Carrinho</button>
                </div>

                <div class="confirm-purchase">
                    <button class="btn-confirm">Confirmar compra</button>
                </div>
            </div>
            
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="JS/clear-cart.js"></script>
<script src="JS/somar-subtrair.js"></script>
</body>

</html>