<?php
require_once("conexao.php");

$filtro = isset($_GET['filtro']) ? trim($_GET['filtro']) : '';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 6;
$offset = ($pagina - 1) * $limite;

// Consulta base com filtro
$sqlBase = "FROM tb_hist v
    INNER JOIN clientes c ON v.idCliente = c.id
    INNER JOIN produtos p ON v.idProduto = p.id
    WHERE c.nm_cliente LIKE :filtro OR p.desc_produto LIKE :filtro";

// Conta total
$stmtTotal = $pdo->prepare("SELECT COUNT(*) $sqlBase");
$stmtTotal->execute([':filtro' => "%$filtro%"]);
$totalRegistros = $stmtTotal->fetchColumn();
$totalPaginas = ceil($totalRegistros / $limite);

// Busca paginada
$stmt = $pdo->prepare("SELECT 
    v.qtQuantidade,
    v.idPreco,
    c.idCliente AS nomeCliente,
    p.Produto AS nomeProduto,
    $sqlBase
    ORDER BY v.data_venda DESC
    LIMIT :limite OFFSET :offset");

$stmt->bindValue(':filtro', "%$filtro%", PDO::PARAM_STR);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Gera HTML das linhas
$html = '';
foreach ($vendas as $v) {
    $html .= "<tr>
        <td>" . htmlspecialchars($v['nomeCliente']) . "</td>
        <td>" . htmlspecialchars($v['nomeProduto']) . "</td>
        <td>" . $v['qtQuantidade'] . "</td>
        <td>R$ " . number_format($v['idPreco'], 2, ',', '.') . "</td>
    </tr>";
}

echo json_encode([
    'tabela' => $html,
    'totalPaginas' => $totalPaginas
]);