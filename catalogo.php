
<link rel="stylesheet" href="CSS/catalogo.css">
<link rel="stylesheet" href="CSS/style.css">

<header class="navbar beige-navbar"> <div class="container">
            <div class="logo">CHRONO</div>
            <nav class="nav-icons">
                <a href="admin.html"><img src="img/admin.png" alt="Administração" title="Administração"></a> <a href="login.html"><img src="img/usuario.png" alt="Usuario" title="Login/Perfil"></a> 
                <a href="carrinho.html"><img src="img/carrinho.png" alt="Cart Icon" title="Carrinho"></a>
            </nav>
        </div>
</header>

<?php
    require_once 'conexao.php';
    $sql = "SELECT * FROM tb_produto";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $produtos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    if($produtos){
        echo "<div class='card-container'>";
        foreach($produtos as $produto){
            echo "<div class='card'>";
            echo "<img src='img/Relógios/relogio1.webp' alt='Imagem do card'>";
            echo "<h3>".$produto['nm_produto']."</h3>";
            echo "<p>Preço: ".$produto['prod_preco']."R$</p>";
            echo "<p>Em estoque: ".$produto['quant_prod']."</p>";
            echo "<p>".$produto['desc_produto']."</p>";
            echo "<button>comprar</button>";
            echo "</div>";
        }
        echo "</div>";
    };
?>


