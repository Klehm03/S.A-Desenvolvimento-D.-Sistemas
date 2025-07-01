<?php
session_start();
$carrinho = $_SESSION['carrinho'] ?? [];
?>

<h2>Seu Carrinho</h2>

<?php if (empty($carrinho)): ?>
  <p>Carrinho vazio.</p>
<?php else: ?>
  <ul>
    <?php foreach ($carrinho as $index => $item): ?>
      <li>
        <?= $item['nome'] ?> - R$<?= $item['preco'] ?>
        
        <button type="submit" value='remover'><a href="remover.php?index=<?= $index ?>" style="text-decoration:none; color:black">Remover</a></button>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<a href="index.php">Voltar para produtos</a>
<button type="submit">Limpar Carrinho</button>

<script>

</script>
