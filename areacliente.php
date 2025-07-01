<?php

session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHRONO - Novos Modelos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/catalogo.css">
</head>
<body>
    <header class="navbar beige-navbar">
        <div class="container">
            <div class="logo">CHRONO</div>
            <nav class="nav-icons">
                <a href="logout.php"><img src="img/usuario.png" alt="Usuario" title="Login/Perfil"></a><span class='estilo'><?php echo $_SESSION['cliente_nome'] ?? 'visitante'?></span>
                <a href="carrinho.php"><img src="img/carrinho.png" alt="Cart Icon" title="Carrinho"></a>
            </nav>
        </div>
    </header>

    <main class="hero-section" style="background-image: url('img/relógio.png');">
        <div class="hero-content">
            <h1>Bem - Vindo</h1>
            <a href="#produto-pagina" class="btn-discover">
                Catalogo
            </a>
        </div>
    </main>

    <section class="dummy-content">
        <div class="container">
            <h2>Sobre a CHRONO</h2>
            <p>Explore a nossa coleção exclusiva de relógios de alta qualidade.</p>
            <p>Seja bem-vindo à CHRONO, onde a precisão encontra o estilo. Descubra a nossa vasta gama de relógios, desde designs clássicos e intemporais até as últimas inovações tecnológicas. Cada peça é cuidadosamente elaborada para garantir não só a máxima funcionalidade, mas também um toque de elegância e sofisticação.</p>
            <p>Na CHRONO, acreditamos que um relógio é mais do que um simples acessório – é uma extensão da sua personalidade e uma declaração de estilo. A nossa paixão pela relojoaria reflete-se na atenção aos detalhes e na escolha de materiais premium, assegurando que cada relógio seja uma obra de arte duradoura.</p>
            <p>Não perca as nossas últimas novidades e as edições limitadas. Mantenha-se conectado e seja o primeiro a conhecer os modelos que estão a definir as tendências. A sua jornada no mundo da alta relojoaria começa aqui.</p>
        </div>
    </section>

    <h1 align="center">Relógios</h1>

    <main class="products-page" id="produto-pagina">
        <div class="container product-grid">
            
            <?php
                require_once 'conexao.php';
                $sql = "SELECT * FROM tb_produto";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $produtos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                if($produtos){
                    
                    echo "<div class='card-container'>";
                    foreach($produtos as $produto){
                        echo '<form class="carrinho card-container" method="POST">';
                            echo "<div class='card'>";
                                echo "<img src='upload/".$produto['img_produto']."' alt='Imagem do card'>";
                                echo "<h3>".$produto['nm_produto']."</h3>";
                                    echo "<p>Preço: ".$produto['prod_preco']."R$</p>";
                                    echo "<p>Em estoque: ".$produto['quant_prod']."</p>";
                                    echo "<p>".$produto['desc_produto']."</p>";
                                    echo "<input type='hidden' name='id_produto' value='".$produto['id_produto']."'>";
                                    echo "<input type='hidden' name='id_cliente' value='".$_SESSION['cliente_id']."'>";
                                    echo "<input type='hidden' name='quantidade_produto' value='1'>";
                                echo "<button type='submit' class='btn-buy'>adicionar ao carrinho</button>";
                            echo "</div>";
                        echo "</form>";
                    }
                    echo "</div>";
                    
                }
                else{
                    echo "<div class='card-container'>";
                        echo "<div class='card'>";
                            echo "<h3>Nenhum produto a venda</h3>";
                        echo "</div>";  
                    echo "</div>";
                }
            ?>

            </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/carrinho.js"></script>

</body>
</html>